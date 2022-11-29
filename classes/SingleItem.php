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
        }
    }


    /**
     * Convert phone numbers into digits, and separate out the extensions into its own property
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function validatePhone ($key, $value) {
        // convert any phone numbers into digits
        if ($key == "phone" && !is_numeric($value)) {
            // check for any non-numeric characters found in phone numbers
            $value = str_replace(
                ['-', '(', ')', '.'],
                '',
                $value);

            // split up any extensions
            $phone_items = explode(" ", $value);
            unset($phone_items[0]);

            // if an extension exists, add the property
            if (!empty($phone_items)) {
                $this->extension = $phone_items[1];
            }
        }
    }

}