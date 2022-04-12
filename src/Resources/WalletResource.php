<?php

namespace AniketIN\Shiprocket\Resources;

use AniketIN\Shiprocket\Shiprocket;

class WalletResource
{
    private $shiprocket;

    public function __construct(Shiprocket $shiprocket)
    {
        $this->shiprocket = $shiprocket;
    }

    public function getBalance()
    {
        return $this->shiprocket->get("https://apiv2.shiprocket.in/v1/external/account/details/wallet-balance");
    }
}
