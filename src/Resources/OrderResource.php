<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class OrderResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function create($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/create/adhoc", $params);
    }

    public function update($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/update/adhoc", $params);
    }

    public function cancelByIds($ids)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/cancel", ['ids' => $ids]);
    }

    public function createChannelSpecific($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/create", $params);
    }

    public function updateCustomerAddress($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/address/update", $params);
    }

    public function detailsById($order_id)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/orders/show/{$order_id}");
    }

    public function all($params = null)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/orders", $params);
    }

    public function export()
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/orders/export");
    }
}
