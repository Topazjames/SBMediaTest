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

// build CSV
// set the headers
$data[] = ['first name', 'last name', 'company name', 'email', 'phone', 'extension', 'city'];

// arrange the data from the users
foreach ($users_data->getData("Users") as $user) {
    $data[] = [
        $user->forename,
        $user->surname,
        $user->company['name'],
        $user->email,
        $user->phone,
        $user->extension ?? '',
        $user->address['city']
    ];
}

// write CSV file
$filename = 'users-' . date('d-m-y-H-i-s') . '.csv';
$file = __DIR__ . '/CSV/' . $filename;

// open (or create) the file
$open_file = fopen($file, 'w');

// check that we have opened the file, if this fails it could be down to permissions
if ($open_file === false) {
    die("File '{$file}' is not writable");
}

foreach ($data as $item) {
    // insert the row into the CSV
    fputcsv($open_file, $item);
}

// close the file
fclose($open_file);


// check if we are using the script via CLI or a browser
if (php_sapi_name() !== "cli") {
    // we're on a browser, download the file
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    readfile($file);
}