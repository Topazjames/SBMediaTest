<?php

class SingleItem {

    /**
     * @param $data
     */
    public function __construct($data) {
        // set an object for each item
        foreach ($data as $key => $item) {
            $this->$key = $item;
        }
    }

}