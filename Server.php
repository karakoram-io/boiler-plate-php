<?php

date_default_timezone_set(TIME_ZONE);

if (ERROR_REPORTING == "ON") {
    ini_set("error_reporting", E_ALL);
} else {
    ini_set("error_reporting", 0);
}

if(ENVIRONMENT == "K2"){
    // development
    define('APP_URL','localhost/' . str_replace(" ", "_", APP_NAME));
} else {
    // production
    define('APP_URL','localhost/' . str_replace(" ", "_", APP_NAME));
}