<?php

namespace Phpcourses\Http;

class Request
{
    public $defaultRoute;

    public function __construct()
    {
        if (!isset($_GET["r"])) {
            $this->defaultRoute = "list";
        }    
    }

    public function getRoute()
    {
        if (!isset($_GET["r"])) {
            return $this->defaultRoute;
        }
        return $_GET["r"];
    }

    public function getParam($name, $default="")
    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $default;
    }

    public
    // add method getPost($name, $default)
}