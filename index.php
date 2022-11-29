<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// include in the required classes
include_once (__DIR__ . "/classes/CurlCaller.php");
include_once (__DIR__ . "/classes/DataHandler.php");
include_once (__DIR__ . "/classes/SingleItem.php");

// set up the relevant objects
$api = new CurlCaller();

// state the endpoint wanting to be used
$api->setEndpoint("users");

// run the call and store in the data handler
$users_data = new DataHandler($api->run());

// sort users into individual objects
$users_data->splitData("Users", "id");

// build CSV
// set the headers
$data[] = ['first name', 'last name', 'company name', 'email', 'phone', 'extension', 'city'];

// arrange the data from the users
foreach ($users_data->getData("Users") as $user) {
    var_dump($user);
    $data[] = [
        $user->forename,
        $user->surname,
        $user->company['name'],
        $user->email,
        $user->phone,
        $user->extension,
        $user->address['city']
    ];
}