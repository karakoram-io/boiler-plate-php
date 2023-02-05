<?php
namespace Karakorum\App\Controllers;

use Karakorum\App\Helper\Response;
use Karakorum\App\Helper\Request;

class KController {
    public $request;
    public $response;
    public $template;
    public $model;

    function __construct($template)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->template = new $template('templates');
    }
}