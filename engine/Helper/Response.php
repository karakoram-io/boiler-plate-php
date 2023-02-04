<?php

namespace Karakorum\App\Helper;

class Response
{

    public $error;
    public $payload;
    public $message;
    public $status;

    public function __construct()
    {
        $this->error = [];
        $this->payload = [];
        $this->message = "";
        $this->status = "";
    }

    public function respond($status, $message, $payload)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'payload' => $payload
        ];

        new Track($response);
        echo json_encode($response);
        exit();
    }

    public function error($status, $message, $error)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'error' => $error
        ];

        new Track($response);
        echo json_encode($response);
        exit();
    }
}