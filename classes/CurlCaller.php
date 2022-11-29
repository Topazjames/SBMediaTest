<?php

class CurlCaller {

    protected $endpoint;
    protected $base = "https://jsonplaceholder.typicode.com/";


    /**
     * @param string $endpoint
     * @return void
     */
    public function setEndpoint(string $endpoint): void {
        $this->endpoint = $endpoint;
    }


    /**
     * @return mixed
     * @throws Exception
     */
    public function run() {
        if (empty($this->endpoint)) {
            throw new \Exception("No endpoint has been provided");
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->base . $this->endpoint);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}