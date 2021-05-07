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
$clubmembership->personId = $_ENV['TESTPERSON_PERSONID'];
$clubmembership->clubId = $_ENV['TESTCLUB_CLUBID'];
$clubmembership->memberNo = $_ENV['TESTMEMBERSHIP_MEMBERNO'];
$clubmembership->membershipType = 'PERMANENT'; // TODO: have not seen any other values and wsdl does not define this as enum. figure out what values are valid here
$clubmembership->isHomeClub = 1;
$clubmembership->isBillsPaid = 1;
$clubmembership->isShareholder = 0;
$clubmembership->isMagazineSubscriber = 1;
$clubmembership->isMagazineDuplicate = 0;
$clubmembership->isMagazineFree = 1;
$clubmembership->isMagazinePaperCopy = 1;
$clubmembership->isMagazineDigitalCopy = 0;
$clubmembership->status = 'ACTIVE'; // one of 'ACTIVE', 'INACTIVE', 'DELETED'
$clubmembership->joinDate = '2019-06-10';
//$clubmembership->resignationDate = '2020-07-12';
//$clubmembership->otherInfo = ''; // TODO: figure out what this is
$clubmembership->membershipVendorLastUpdateDate = date('c');

$addresslist = new stdClass();
$addresslist->isPrimary = 1;
$addresslist->useAsClubMember = 1;
$addresslist->useAsClubFunctionary = 1;
$addresslist->useAsOrganizationFunctionary = 1;
$addresslist->status = 'ACTIVE'; // one of 'ACTIVE', 'INACTIVE', 'DELETED'
//$addresslist->streetAddress = 'Street';
//$addresslist->POBox = '';
//$addresslist->zipCode = '12345';
//$addresslist->city = 'City';
//$addresslist->country = 'Finland';
//$addresslist->description = 'Description text';
//$clubmembership->addressList = $addresslist;

$emailaddresslist = new stdClass();
$emailaddresslist->isPrimary=1;
$emailaddresslist->useAsClubMember=1;
$emailaddresslist->useAsClubFunctionary=1;
$emailaddresslist->useAsOrganizationFunctionary=1;
$emailaddresslist->status=1;
$emailaddresslist->email=$_ENV['TESTPERSON_PRIMARYEMAIL'];
//$emailaddresslist->description='';
//$clubmembership->emailAddressList = $emailaddresslist;

$phonelist = new stdClass();
$phonelist->isPrimary = 1;
//$phonelist->isFax = 0;
$phonelist->useAsClubMember = 1;
$phonelist->useAsClubFunctionary = 1;
$phonelist->useAsOrganizationFunctionary = 1;
$phonelist->status = 'ACTIVE'; // one of 'ACTIVE', 'INACTIVE', 'DELETED'
$phonelist->phoneNumber = '123123';
$phonelist->description = '';
//$clubmembership->phoneList = $phoneList;


# fetch all clubs and print them out
try {
    $result = $client->addClubMembership(['clubMembership' => $clubmembership]);
    print_r($result);
} catch (SoapFault $e) {
    print("Error: " . $e->getMessage());
}

