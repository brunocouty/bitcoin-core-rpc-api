<?php

namespace BrunoCouty\BitcoinCoreRPCAPI;

use Illuminate\Support\Facades\Facade;

class BitcoinCoreRPCAPIFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'brunocouty-bitcoin-core-rpc-api';
    }
}