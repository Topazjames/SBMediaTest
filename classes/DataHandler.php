<?php

class DataHandler {

    protected $data;

    /**
     * @param $data
     */
    public function __construct($data) {
        $this->data = $data;
    }

    
    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }
}