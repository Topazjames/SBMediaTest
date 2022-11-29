<?php
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