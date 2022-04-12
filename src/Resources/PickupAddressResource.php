<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class PickupAddressResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function all()
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/settings/company/pickup");
    }

    public function create($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/settings/company/addpickup", $params);
    }
}
