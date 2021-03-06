<?php

namespace BrunoCouty\BitcoinCoreRPCAPI;


use Illuminate\Support\ServiceProvider;

class BitcoinCoreRPCAPIServiceProvider extends ServiceProvider
{
    public function boot()
    {
//        Publish the files
        $this->publishes([
            __DIR__ . '/resources/config/bitcoin-api.php' => config_path('bitcoin-api.php'),
        ]);
//        $this->publishes([
//            __DIR__.'/resources/views/' => resource_path('views'),
//        ]);
//        Reference path to resources
//        $this->loadViewsFrom(__DIR__.'/resources/views/logs', 'laravel-logs-viewer');
//        Publish vendor assets
//        $this->publishes([
//            __DIR__ . '/resources/assets/' => public_path("/vendor/laravel-logs-viewer"),
//        ], 'public');
    }

    public function register()
    {
        $this->app->bind('brunocouty-bitcoin-core-rpc-api', function() {
            return new BitcoinCoreRPCAPI;
        });
    }
}