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

# add new person
$person = new stdClass();
$person->firstName = 'Testi';
$person->lastName = 'Petteri';
$person->status = 'ACTIVE'; // one of 'ACTIVE', 'INACTIVE', 'DELETED'
$person->homeClubId = '0099'; // Hiisi-golf
$person->gender = 'MALE'; // one of 'MALE', 'FEMALE'
$person->birthDate = '1980-08-02';
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
$person->primaryAddress = 'Testikatu Kaupunki 12345';
$person->primaryPhone = '044123123';
$person->primaryEmail = 'test@example.com';
$person->isMemberOfSGLSeniors = 0;
$person->personVendorLastUpdateDate = date('c'); // now

try {
    $response = $client->addNewPerson(['person' => $person]);
    print_r($response);
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}
