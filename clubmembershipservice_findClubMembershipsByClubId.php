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

$clubmembership = new stdClass();
$clubmembership->clubId = $_ENV['TESTCLUB_CLUBID'];

# fetch all clubs and print them out
try {
    $memberships = $client->findClubMembershipsByClubId($clubmembership);

    foreach ($memberships->return as $membership) {
            print_r($membership);
    }

} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}

