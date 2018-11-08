<?php

namespace BrunoCouty\BitcoinCoreRPCAPI\Controllers;


use BrunoCouty\BitcoinCoreRPCAPI\Services\Bitcoin;

class APIController
{
    public function auth()
    {
        $conn = new Bitcoin('something',
            'secret',
            '198.199.76.171');
        dump(request()->ip());
        return $conn;
    }

    public function test()
    {
        dump($this->auth()->getnewaddress());
        return "fim";
    }

    public function getAddress()
    {

    }
}