<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class ShipmentResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function all($params = null)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/shipments", $params);
    }

    public function detailsById($shipment_id)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/shipments/$shipment_id");
    }

    public function cancelByAWBs($awbs)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/cancel/shipment/awbs", ['awbs' => $awbs]);
    }
}
