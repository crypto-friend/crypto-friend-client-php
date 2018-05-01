<?php
require_once('crypto-friend-client.php'); //Download PHP Client to get this file

$yourApiKey = "H218Iz02u84KOp5H1b6Op2eg"; // H218Iz02u84KOp5H1b6Op2eg - this is example of api key. Get your api key by: https://crypto-friend.pro/dashboard (after Sign Up)

$instance = new Bitcoin($yourApiKey); // for Bitcoin OR $instance = new Ethereum(); - for Ethereum

$walletFrom = "wallet1"; //name of your wallet from you send coins
$addressTo = "33QDzFDmePTWMGzmmMFPfJYT3hpRFgdrpi"; //address that receive coins //33QDzFDmePTWMGzmmMFPfJYT3hpRFgdrpi - this is example of bitcoin address, please use real receiver address

$amount = 0.00001; // amount in btc or eth. Current balance on wallet_from must be greater than (amount + current fee of blockchain)

$response = $instance->createTransaction($walletFrom, $addressTo, $amount);

echo $response->status . ' '; // "ok" or "error"
echo $response->result . ' '; // created address for wallet, you can give this address to anyone for receiving the coins.
echo $response->available_requests . ' '; //count of available requests after this request