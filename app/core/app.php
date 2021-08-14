<?php

Class App{
    protected $controller = "home";
    protected $method = "index";

    public function __construct(){
        $url = $this->parseURL();
        print_r($url);
    }

    private function parseURL(){
        $url = $_GET['url'];
        return $url;
    }
}