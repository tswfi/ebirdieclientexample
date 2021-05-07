<?php
/**
 * Example for fetching clubs from eBirdie
 */
require "vendor/autoload.php";

# load secrets to env from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

# init the client
$client = new tswfi\Ebirdie\Client($_ENV['EBIRDIE_WSDL'], $_ENV['EBIRDIE_LOGIN'], $_ENV['EBIRDIE_PASS']);

# fetch all clubs and print them out
try {
    $clubs = $client->__soapCall('fetchAllClubs', []);

    foreach ($clubs->return as $club) {
        if ($club->city == 'Turku') {
            print_r($club);
        }
    }
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
    print("Request headers: " . $client->__getLastRequestHeaders());
    print("Request: " . $client->__getLastRequest());
    print("Response headers: " . $client->__getLastResponseHeaders());
    print("Response: " . $client->__getLastResponse());
}

