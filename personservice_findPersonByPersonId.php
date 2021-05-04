<?php
/**
 * Example for finding person with name and birthday
 */
require "vendor/autoload.php";

# load secrets to env from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

# init the client
$client = new tswfi\Ebirdie\Client($_ENV['EBIRDIE_WSDL'], $_ENV['EBIRDIE_LOGIN'], $_ENV['EBIRDIE_PASS']);

# find person with personid

$person = new stdClass();
$person->personId = $_ENV['TESTPERSON_PERSONID'];

try {
    $personResponse = $client->findPersonByPersonId($person);
    $person = $personResponse->return;
    print_r($person);
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}

