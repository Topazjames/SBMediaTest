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
    public function getAllData():mixed {
        return $this->data;
    }


    /**
     * Getter for the split data set
     *
     * @param string $object
     * @return mixed
     */
    public function getData(string $object) {
        return $this->$object;
    }


    /**
     * Split all the data into their own class/object - the object name and key can be set via parameters
     *
     * @param string $object_name
     * @param string $key
     * @return void
     */
    public function splitData(string $object_name, string $key = ""):void {
        // for each item, create an object
        foreach ($this->data as $item) {
            $this->{$object_name}[$item[$key]] = new SingleItem($item);
        }
    }
}