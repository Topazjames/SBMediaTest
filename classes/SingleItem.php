<?php

class SingleItem {

    /**
     * @param $data
     */
    public function __construct($data) {
        // set an object for each item
        foreach ($data as $key => $item) {
            // set the item object
            $this->$key = $item;

            // convert any phone numbers into digits
            if ($key == "phone" && !is_numeric($item)) {
                // check for any non-numeric characters found in phone numbers
                $item = str_replace(
                    ['-', '(', ')', '.'],
                    '',
                    $item);

                // split up any extensions
                $phone_items = explode(" ", $item);
                unset($phone_items[0]);

                // set the extensions
                foreach ($phone_items as $extension) {
                    $this->extensions[] = $extension;
                }
            }
        }
    }

}