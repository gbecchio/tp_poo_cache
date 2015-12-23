<?php
namespace OCFram;
<<<<<<< HEAD

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
=======
 
class HTTPRequest extends ApplicationComponent
{
  public function cookieData($key)
  {
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
  }
 
  public function cookieExists($key)
  {
    return isset($_COOKIE[$key]);
  }
 
  public function getData($key)
  {
    return isset($_GET[$key]) ? $_GET[$key] : null;
  }
 
  public function getExists($key)
  {
    return isset($_GET[$key]);
  }
 
  public function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }
 
  public function postData($key)
  {
    return isset($_POST[$key]) ? $_POST[$key] : null;
  }
 
  public function postExists($key)
  {
    return isset($_POST[$key]);
  }
 
  public function requestURI()
  {
    return $_SERVER['REQUEST_URI'];
  }
>>>>>>> 619c8188948b4e2c5d314eed51642a8a3386e453
}