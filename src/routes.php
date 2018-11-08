<?php

Route::group(
    [
        'prefix' => 'api-btc',
    ],
    function () {
        Route::get('test', ['as' => 'apibtc.test','uses' => '\BrunoCouty\BitcoinCoreRPCAPI\Controllers\APIController@test']);
    });