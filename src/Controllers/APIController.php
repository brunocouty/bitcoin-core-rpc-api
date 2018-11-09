<?php

namespace BrunoCouty\BitcoinCoreRPCAPI\Controllers;


use BrunoCouty\BitcoinCoreRPCAPI\Services\Bitcoin;

class APIController
{
    public function auth()
    {
        $conn = new Bitcoin(
            config('bitcoin-api.rpc_user'),
            config('bitcoin-api.rpc_password')
        );
        if ($conn === false) {
            return "Error on connect.";
        }
        return $conn;
    }

    public function test()
    {
        return $this->auth()->getnewaddress();
    }

    public function getAddress()
    {

    }
}