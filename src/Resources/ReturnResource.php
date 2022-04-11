<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class ReturnResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function create($params)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/create/return", $params);
    }

    public function all($params = null)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/orders/processing/return", $params);
    }

    public function serviceability($params)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/serviceability/", $params);
    }

}
