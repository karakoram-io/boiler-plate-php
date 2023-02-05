<?php

// loading configs
$configs  = json_decode(file_get_contents("config.json"));
foreach ($configs as $key => $value) {
    define($key, $value);
}

// summoning Thanos
include("Bootstrap.php");