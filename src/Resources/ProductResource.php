<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class ProductResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function all($params = null)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/products", $params);
    }

    public function detailsById($product_id)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/products/show/$product_id");
    }

    public function create($params = null)
    {
        return $this->shiprocket->post("https://apiv2.shiprocket.in/v1/external/products", $params);
    }
}
