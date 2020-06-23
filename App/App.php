<?php

namespace App;

class App
{
    public static function run()
    {
        $path = $_SERVER['REQUEST_URI'];
        
        if ($path == '/'){
            $controller = 'Controllers\\TaskController';
            $action = 'main';
        } else {
            $pathParts = explode('/', $path);
            $controller = ucfirst($pathParts[1]);
            $action = $pathParts[2];
            $controller = 'Controllers\\' . $controller . 'Controller';
        
            if (!class_exists($controller)) {
                throw new \ErrorException('Controller does not exist');
            }
        }
        
        $objController = new $controller;
        
        if (!method_exists($objController, $action)) {
            throw new \ErrorException('action does not exist');
        }
        
        $objController->$action();
    }
}