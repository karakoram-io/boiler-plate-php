<?php

namespace Karakorum\App\Controllers;

use GuzzleHttp\Client;
use Karakorum\App\Helper\Track;
use Karakorum\App\Helper\StatusCode;

class Sample extends KController
{
    /**
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        echo "<pre>";
        print_r($this->request);
        echo "<br/>";
        print_r($this->response->respond(StatusCode::STATUS_200, "Sample Message", []));
        echo "<br/>";
        print_r($this->response->error(StatusCode::NOT_FOUND, "Not Found", []));
        echo "</pre>";
    }
    /**
     * @return mixed
     */
    public static function action()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/',
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', 'api.json');

        print_r($response);
    }
}