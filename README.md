# Simple example for using ebirdieclient

Examples for using [ebirdieclient](https://github.com/tswfi/ebirdieclient) php library

# Getting started

```bash
git clone git@github.com:tswfi/ebirdieclientexample.git
composer install
cp .env.example .env
```

And add your secrets to .env file (get these from eBirdie)

Change the test user information to something that you know exists in the system

Check the different example scripts and run them to see what happens.

# The following examples are provided:

## Person service
* [personservice_addNewPerson.php](personservice_addNewPerson.php) - add new person, requires extra permissions
* [personservice_findPersonByNameAndBirthdate.php](personservice_findPersonByNameAndBirthdate.php) - find with full name and birthday. usefull if you don't know the personid yet
* [personservice_findPersonByPersonId.php](personservice_findPersonByPersonId.php) - fetch person data with person id
* [personservice_updatePerson.php](personservice_updatePerson.php) - update person data

## Club membership service
* [clubmembershipservice_findClubMembershipsByClubId.php](clubmembershipservice_findClubMembershipsByClubId.php) - Get all memberships for one club
* [clubmembershipservice_addClubMembership.php](clubmembershipservice_addClubMembership.php) - Add membership to club, requires extra permissions
* [clubmembershipservice_updateClubMembership.php](clubmembershipservice_updateClubMembership.php) - TODO
* [clubmembershipservice_removeClubMember.php](clubmembershipservice_removeClubMember.php) - TODO

## Club service
* [clubservice_fetchAllClubs.php](clubservice_fetchAllClubs.php) - fetch all clubs


Note: if you use the wsdl from staging the calls will be done against staging and if you use the live wsdl the calls will be done to live.