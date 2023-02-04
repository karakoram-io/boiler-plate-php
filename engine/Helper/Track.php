<?php

namespace Karakorum\App\Helper;

class Track
{

    public $directory;
    public $file;

    public function __construct($data)
    {
        $this->file = date('Ymd') . ".log";
        $this->directory = "logs/" . date('Ymd');

        if (!is_dir($this->directory)) {
            mkdir($this->directory);
            $this->writeData($data);
        } else {
            $this->writeData($data);
        }
    }

    private function writeData($data){
        if (!empty($data)) {
            $log = "";
            $log .= "#######################" . $_SERVER['REMOTE_ADDR'] . ' - ' . date("Ymdhis") . PHP_EOL;
            $log .= "Logged :: " . json_encode($data) . PHP_EOL;
            $log .= "######################################################" . PHP_EOL;
            file_put_contents($this->directory ."/". $this->file, $log, FILE_APPEND);
        }
    }
}