<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class CountryResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function codes()
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/countries");
    }

    public function zones($country_id)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/countries/show/$country_id");
    }

    public function localityDetails($postcode)
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/open/postcode/details", ['postcode' => $postcode]);
    }
}
