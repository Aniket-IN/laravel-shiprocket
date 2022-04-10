<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class CourierResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function list($params = null)
    {
        $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/courierListWithCounts/", $params);
    }

    public function serviceability($params = null)
    {
        $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/serviceability/", $params);
    }

    public function internationalServiceability($params = null)
    {
        $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/international/serviceability", $params);
    }

    public function generateAwbForShipment($params = null)
    {
        $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/courier/assign/awb", $params);
    }

    public function requestShipmentPickup($params = null)
    {
        $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/courier/generate/pickup", $params);
    }
}
