<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class TrackingResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        return $this->shiprocket = $shiprocket;
    }

    public function awb($awb)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/track/awb/$awb");
    }

    public function multipleAwb(array $awbs)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/courier/track/awbs", ['awbs' => $awbs]);
    }

    public function shipment($shipment_id)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/track/shipment/$shipment_id");
    }

    public function order($order_id, $channel_id = null)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/courier/track", ['order_id' => $order_id, 'channel_id' => $channel_id]);
    }
}
