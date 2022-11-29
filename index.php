<?php
// include in the required classes
include_once (__DIR__ . "/classes/CurlCaller.php");

// set up the relevant objects
$api = new CurlCaller();

// state the endpoint wanting to be used
$api->setEndpoint("users");

// run the call
$users = $api->run();

