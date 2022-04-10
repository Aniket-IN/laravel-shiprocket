<?php

namespace AniketIN\Shiprocket;

use Error;
use Illuminate\Support\Facades\Http;
use AniketIN\Shiprocket\Resources\OrderResource;
use AniketIN\Shiprocket\Resources\CourierResource;
use AniketIN\Shiprocket\Resources\ShipmentResource;


class Shiprocket
{
    protected $credentials;
    protected $response_method;
    protected $token;

    public function responseMethod($response_method)
    {
        $this->response_method = $response_method;

        return $this;
    }

    public function withCredential($credential_id)
    {
        $this->credentials = config('shiprocket.credentials')[$credential_id];
        $this->token = $this->getToken();

        return $this;
    }

    public function __construct()
    {
        $this->response_method = config('shiprocket.default_response_method');
        $this->credentials = config('shiprocket.credentials')[config('shiprocket.default_credentials')];
        $this->token = $this->getToken();
    }

    public function order()
    {
        return new OrderResource($this);
    }

    public function shipment()
    {
        return new ShipmentResource($this);
    }

    public function courier()
    {
        return new CourierResource($this);
    }

    public function getToken(): string
    {
        $duration = config('shiprocket.token_cache') ? config('shiprocket.token_cache_duration') : 0;
       
        if (! $duration) {
            return $this->callApiForToken();
        }
        
        return cache()->remember("shiprocket-token-{$this->credentials['email']}", $duration, function () {
            return $this->callApiForToken();
        });
    }

    private function callApiForToken()
    {
        $call = Http::post("https://apiv2.shiprocket.in/v1/external/auth/login", [
            'email' => $this->credentials['email'],
            'password' => $this->credentials['password'],
        ]);

        if ($call->failed()) throw new Error($call->body());
    
        return $call->json()['token'];
    }

    public function get($url, $data = null)
    {
        return $this->formatData(Http::withToken($this->token)->retry(3, 100)->get($url, $data));
    }

    public function post($url, $data = null)
    {
        return $this->formatData(Http::withToken($this->token)->retry(3, 100)->post($url, $data));
    }

    private function formatData($response)
    {
        switch ($this->response_method) {
            case 'body':
                return $response->body();

            case 'json':
                return $response->json();

            case 'object':
                return $response->object();

            case 'collect':
                return $response->collect();

            case 'status':
                return $response->status();

            case 'ok':
                return $response->ok();

            case 'successful':
                return $response->successful();

            case 'redirect':
                return $response->redirect();

            case 'failed':
                return $response->failed();

            case 'serverError':
                return $response->serverError();

            case 'clientError':
                return $response->clientError();

            case 'header':
                return $response->header();

            case 'headers':
                return $response->headers();

            default:
                throw new Error("Unexpected response type");
        }
    }
}
