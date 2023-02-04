<?php

use Karakorum\App\Helper\Response;
use Karakorum\App\Helper\StatusCode;

class Route
{
    public static function Render(): void
    {
        $uri = self::processURI();
        $controller = $uri['controller'];
        $method = $uri['method'];

        try{

            if($controller == ""){
                throw new Exception();
            }

            $args = $uri['args'];

            $keys = [];
            $values = [];
            foreach ($args as $key => $value) {
                if( ($key%2) ==0){
                    $keys[] = $value;
                } else {
                    $values[] = $value;
                }
            }

            for ($i = 0; $i < count($keys);$i++){
                $_GET[$keys[$i]] = $values[$i];
            }

            $a = "Karakorum\\App\\Controllers\\" . $controller;
            if(!class_exists($a)){
                throw new Exception();
            }
            
            $c = new $a();
            $c->$method();
            
        } catch(Exception $e){
            $response = new Response();
            $response->error(StatusCode::NOT_FOUND, "Controller Not Found", []);
        }
    }

    public static function getURI(): array
    {
        $path_info = $_SERVER['PATH_INFO'] ?? '/';
        return explode('/', $path_info);
    }

    public static function processURI(): array
    {
        $controllerPart = self::getURI()[1] ?? '';
        $methodPart = self::getURI()[2] ?? '';
        $numParts = count(self::getURI());
        $argsPart = [];
        
        for ($i = 3; $i < $numParts; $i++) {
            $argsPart[] = self::getURI()[$i] ?? '';
        }

        //Let's create some defaults if the parts are not set
        $controller = !empty($controllerPart) ? ucfirst($controllerPart) : '';
        $method = !empty($methodPart) ? $methodPart : 'index';
        $args = !empty($argsPart) ? $argsPart : [];

        return [
            'controller' => $controller,
            'method' => $method,
            'args' => $args
        ];
    }
}