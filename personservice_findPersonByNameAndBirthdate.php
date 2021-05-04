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

# find person with firstname and lastname and birthday
$person = new stdClass();
$person->firstName = $_ENV['TESTPERSON_FIRSTNAME'];
$person->lastName = $_ENV['TESTPERSON_LASTNAME'];
$person->birthDate = $_ENV['TESTPERSON_BIRTHDAY'];

try {
    $persons = $client->findPersonByNameAndBirthdate($person);
    print_r($persons->return);
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}
