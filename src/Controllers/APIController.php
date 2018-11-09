<?php

namespace BrunoCouty\BitcoinCoreRPCAPI\Controllers;

use BrunoCouty\BitcoinCoreRPCAPI\Services\Bitcoin;

class APIController
{
    /**
     * Input access credentials.
     * @return Bitcoin
     */
    private function auth()
    {
        $conn = new Bitcoin(
            config('bitcoin-api.rpc_user'),
            config('bitcoin-api.rpc_password')
        );
        return $conn;
    }

    /**
     * Test the capabilities to run commands on bitcoin server.
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function test()
    {
        if ($this->auth()->getwalletinfo() == false) {
            return response([
                'data' => [
                    'message' => "The server returns 'false'. Verify the service status and access data."
                ]
            ], 412);
        }
    }

    /**
     * Test if the method return a valid value.
     * @param $response
     * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    private function test_response($response)
    {
        if ($response == false) {
            return response([
                'data' => [
                    'message' => "The server returns 'false'. Verify the service status and access data."
                ]
            ], 412);
        }
        return true;
    }

    /**
     * Return a valid wallet address from Bitcoin server.
     * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getNewAddress()
    {
        $address = $this->auth()->getnewaddress();
        $test = $this->test_response($address);
        if ($test->getStatusCode()) {
            return $test;
        }
        return $address;
    }

    /**
     * Return the current balance from Bitcoin server.
     * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getCurrentBalance()
    {
        $balance = $this->auth()->getbalance();
        $test = $this->test_response($balance);
        if ($test->getStatusCode() == 412) {
            return $test;
        }
        return $balance;
    }

    /**
     * Send bitcoins to another address.
     * @param $wallet
     * @param $btc_amount
     * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sendBitcoins($wallet, $btc_amount)
    {
        $txID = $this->auth()->sendtoaddress($wallet, $btc_amount);
        $test = $this->test_response($txID);
        if ($test->getStatusCode() != 201) {
            return $test;
        }
        return response([

        ], 201);
    }
}