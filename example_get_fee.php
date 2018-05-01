<?php
require_once('crypto-friend-client.php'); //Download PHP Client to get this file

$yourApiKey = "H218Iz02u84KOp5H1b6Op2eg"; // H218Iz02u84KOp5H1b6Op2eg - this is example of api key. Get your api key by: https://crypto-friend.pro/dashboard (after Sign Up)

$instance = new Bitcoin($yourApiKey); // for Bitcoin OR $instance = new Ethereum(); - for Ethereum

$response = $instance->getFee();

echo $response->status . ' '; // "ok" or "error"
echo $response->result . ' '; // created address for wallet, you can give this address to anyone for receiving the coins.
echo $response->available_requests . ' '; //count of available requests after this request