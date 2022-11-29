<?php

class SingleItem {

    /**
     * Set each item into its own property
     *
     * @param $data
     */
    public function __construct($data) {
        // set an object for each item
        foreach ($data as $key => $item) {
            // set the item object
            $this->$key = $item;

            // validate the phone
            $this->validatePhone($key, $item);

            // validate the email
            $this->validateEmail($key, $item);

            // separate out forename and surname
            $this->separateNames($key, $item);
        }
    }


    /**
     * Convert phone numbers into digits, and separate out the extensions into its own property
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function validatePhone ($key, $value):void {
        // convert any phone numbers into digits
        if ($key == "phone" && !is_numeric($value)) {
            // check for any non-numeric characters found in phone numbers
            $value = str_replace(
                ['-', '(', ')', '.'],
                '',
                $value);

            // split up any extensions
            $phone_items = explode(" ", $value);

            // set the phone with the digitalised version
            $this->phone = (int)$phone_items[0];
            unset($phone_items[0]);

            // if an extension exists, add the property
            if (!empty($phone_items)) {
                $this->extension = $phone_items[1];
            }
        }
    }


    /**
     * Validate whether an email address is valid
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function validateEmail($key, $value):void {
        if ($key == "email") {
            $this->email_valid = (bool)filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    }


    public function separateNames($key, $value):void {
        if ($key == "name") {
            $names = explode(" ", $value);
            $this->forename = $names[0];
            $this->surname = $names[1];
        }
    }

}