<?php 
$I = new DoctrineTester($scenario);
$I->wantTo('check that the user was persisted');

$I->dontSeeInRepository('\AppBundle\Entity\User', ['name' => 'John Doe']);

$I->amOnPage('/doctrine');
$I->seeResponseCodeIs(200);
$I->fillField('name', 'John Doe');
$I->click('Create User');

$I->seeInRepository('\AppBundle\Entity\User', ['name' => 'John Doe']);