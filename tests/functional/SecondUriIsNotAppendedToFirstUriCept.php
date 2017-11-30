<?php 
$I = new FunctionalTester($scenario);

$I->sendGET('/posts/1');
$I->seeResponseEquals('Show Post #1');

$I->sendPOST('/doctrine/create-user',['name' => 'John']);
$I->seeResponseEquals('User created');
$I->seeCurrentUrlEquals('/doctrine/create-user');