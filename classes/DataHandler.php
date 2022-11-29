<?php

class DataHandler {

    protected $data;

    /**
     * On load of the handler, set the data in question
     *
     * @param $data
     */
    public function __construct($data) {
        $this->data = $data;
    }


    /**
     * Getter for the data set in the handler when the object was created
     *
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }
}