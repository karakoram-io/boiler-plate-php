<?php
namespace Karakorum\App\Controllers;

use Karakorum\App\Helper\Response;
use Karakorum\App\Helper\Request;

class KController {
    public $request;
    public $response;
    public $model;

    function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
    }
}