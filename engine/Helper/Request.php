<?php

namespace Karakorum\App\Helper;

class Request
{

    public $post;
    public $get;
    public $file;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->file = $_FILES;

        new Track([
            'post'  => $this->post,
            'get'   => $this->get,
            'file'  => $this->file
        ]);
    }
}