<?php
class CryptoFriendClient
{
    protected $yourApiKey;
    const GATEWAY = "https://crypto-friend.pro/api";
    protected static $currency;

    protected function __construct($apiKey)
    {
        $this->yourApiKey = $apiKey;
    }

    public function createWallet($walletName)
    {
        $request = new stdClass();

        $request->your_api_key = $this->yourApiKey;
        $request->method = 'create-wallet';
        $request->currency = static::$currency;

        $request->wallet_name = $walletName;

        return $this->curl($request);
    }

    public function getBalance($walletName)
    {
        $request = new stdClass();
        $request->your_api_key = $this->yourApiKey;
        $request->method = 'get-balance';
        $request->currency = static::$currency;

        $request->wallet_name = $walletName;

        return $this->curl($request);
    }

    public function createTransaction($walletFrom, $addressTo, $amount)
    {
        $request = new stdClass();
        $request->your_api_key = $this->yourApiKey;
        $request->method = 'create-transaction';
        $request->currency = static::$currency;

        $request->wallet_from = $walletFrom;
        $request->address_to = $addressTo;
        $request->amount = $amount;

        return $this->curl($request);
    }

    public function getFee()
    {
        $request = new stdClass();
        $request->your_api_key = $this->yourApiKey;
        $request->method = 'get-fee';
        $request->currency = static::$currency;

        return $this->curl($request);
    }

    private function curl($request)
    {
        $request = json_encode($request);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,static::GATEWAY);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);

    }

}
class Bitcoin extends CryptoFriendClient
{
    protected static $currency = "bitcoin";

    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }
}

class Ethereum extends CryptoFriendClient
{
    public static $currency = "ethereum";

    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }
}