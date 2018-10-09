<?php

class Request
{
    private $requestInfo;

    public function __construct()
    {
        $this->requestInfo = $_REQUEST;
    }

    public static function getUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function getHeaders() {
        
    }
}