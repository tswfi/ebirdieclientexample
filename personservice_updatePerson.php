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

# update person data

$person = new stdClass();
$person->personId = $_ENV['TESTPERSON_PERSONID'];
$person->firstName = $_ENV['TESTPERSON_FIRSTNAME'];
$person->lastName = $_ENV['TESTPERSON_LASTNAME'];
$person->status = 'ACTIVE'; // one of 'ACTIVE', 'INACTIVE', 'DELETED'
$person->homeClubId = '0099'; // Hiisi-golf
$person->gender = 'MALE'; // one of 'MALE', 'FEMALE'
$person->birthDate = $_ENV['TESTPERSON_BIRTHDAY'];
$person->hasValidMemberCard = 1;
$person->hasTemporaryNGUcard = 0;
$person->hasPermanentNGUcard = 0;
$person->isDataPublic = 1;
$person->isContactingAllowedByPost = 0;
$person->isContactingAllowedByPhone = 0;
$person->isContactingAllowedByEmail = 0;
$person->isAdvertisingAllowedByPost = 0;
$person->isAdvertisingAllowedByEmail = 0;
$person->isAdvertisingAllowedByPhone = 0;
$person->playerStatus = 'AM'; // one of 'AM', 'PRO', 'NON_PRO'
$person->primaryAddress = $_ENV['TESTPERSON_PRIMARYADDRESS'];
$person->primaryPhone = $_ENV['TESTPERSON_PRIMARYPHONE'];
$person->primaryEmail = $_ENV['TESTPERSON_PRIMARYEMAIL'];
$person->isMemberOfSGLSeniors = 0;
$person->personVendorLastUpdateDate = date('c');

try {
    $response = $client->updatePerson(['updatePerson' => $person]);
    print_r($response->return);
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}
