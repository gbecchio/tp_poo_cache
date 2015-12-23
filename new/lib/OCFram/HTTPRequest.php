<?php
namespace OCFram;

class HTTPRequest
{
    protected $method;
    protected $uri;

    public function cookieData($key)
    {
        return ($this->cookieExists($key))?$_COOKIE[$key]:null;
    }
    public function cookieExists($key)
    {
        return (bool) isset(_COOKIE[$key]);
    }
    public function getData($key)
    {
        return $this->$_GET[$key];
    }
    public function getExists($key)
    {
        return (bool) isset($_GET[$key]);
    }
    public function method()
    {
        return $this->method;
    }
    public function postData($key)
    {
        return $_POST[$key];
    }
    public function postExists($key)
    {
        return (bool) isset($_POST[$key]);
    }
    public function requestURI()
    {
        return $this->uri;
    }
}