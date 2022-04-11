<?php

namespace AniketIN\Shiprocket;

use AniketIN\Shiprocket\Resources\CourierResource;
use AniketIN\Shiprocket\Resources\OrderResource;
use AniketIN\Shiprocket\Resources\ReturnResource;
use AniketIN\Shiprocket\Resources\ShipmentResource;
use Error;
use Illuminate\Support\Facades\Http;

class Shiprocket
{
    protected $credentials;
    protected $token;

    public function withCredential($credential_id)
    {
        $this->credentials = config('shiprocket.credentials')[$credential_id];
        $this->token = $this->getToken();

        return $this;
    }

    public function __construct()
    {
        $this->credentials = config('shiprocket.credentials')[config('shiprocket.default_credentials')];
        $this->token = $this->getToken();
    }

    public function order()
    {
        return new OrderResource($this);
    }

    public function return()
    {
        return new ReturnResource($this);
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
        return $this->login()->json()['token'];
    }

    public function login()
    {
        $duration = config('shiprocket.token_cache') ? config('shiprocket.token_cache_duration') : 0;

        if (! $duration) {
            return $this->callLoginApi();
        }

        return cache()->remember("shiprocket-token-{$this->credentials['email']}", $duration, function () {
            return $this->callLoginApi();
        });
    }

    private function callLoginApi()
    {
        $call = Http::post("https://apiv2.shiprocket.in/v1/external/auth/login", [
            'email' => $this->credentials['email'],
            'password' => $this->credentials['password'],
        ]);

        if ($call->failed()) {
            throw new Error($call->body());
        }

        return $call;
    }

    public function httpClient()
    {
        return Http::withToken($this->token)->retry(3, 100);
    }

    public function patch($url, $data = null)
    {
        return $this->httpClient()->patch($url, $data);
    }

    public function get($url, $data = null)
    {
        return $this->httpClient()->get($url, $data);
    }

    public function post($url, $data = null)
    {
        return $this->httpClient()->post($url, $data);
    }
}
