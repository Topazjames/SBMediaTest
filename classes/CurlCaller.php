<?php

class CurlCaller {

    protected $endpoint;
    protected $base = "https://jsonplaceholder.typicode.com/";


    /**
     * Sets the endpoint to call for the API
     *
     * @param string $endpoint
     * @return void
     */
    public function setEndpoint(string $endpoint): void {
        $this->endpoint = $endpoint;
    }


    /**
     * Run the API call via Curl
     *
     * @return mixed
     * @throws Exception
     */
    public function run() {
        // verify we have an endpoint to call, if not throw an error
        if (empty($this->endpoint)) {
            throw new \Exception("No endpoint has been provided");
        }

        // start the curl call
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->base . $this->endpoint);
        $result = curl_exec($ch);
        curl_close($ch);

        // return the results as an array
        return json_decode($result, true);
    }
}