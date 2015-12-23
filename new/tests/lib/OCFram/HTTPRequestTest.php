<?php
// namespaces tests;

use OCFram\HTTPRequest;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class HTTPRequestTest extends PHPUnit_Framework_TestCase
{
    private $class;
    protected function setUp()
    {
        $this->class = new HTTPRequest();
        global $_COOKIE, $_GET, $_SERVER, $_POST, $_SERVER;
        $_COOKIE['test'] = 'test';
        $_GET['test'] = 'test';
        $_SERVER['REQUEST_METHOD'] = "POST";
        $_POST['test'] = 'test';
        $_SERVER['REQUEST_URI'] = "http://www/google.fr";
    }

    public function testCookieData()
    {
         $this->assertEquals($this->class->cookieData('test'), 'test');
    }

    public function testCookieExists()
    {
         $this->assertTrue($this->class->cookieExists('test'));
         $this->assertFalse($this->class->cookieExists('test2'));
    }

    public function testGetData()
    {
         $this->assertEquals($this->class->getData('test'), 'test');
         $this->assertEquals($this->class->getData('test2'), null);
    }

    public function testGetExists()
    {
        $this->assertTrue($this->class->getExists('test'));
        $this->assertFalse($this->class->getExists('test2'));
    }

    public function testMethod()
    {
        $this->assertEquals($this->class->method(), 'POST');
        $this->assertNotEquals($this->class->method(), 'GET');
    }
    public function testPostData()
    {
        $this->assertEquals($this->class->postData('test'), 'test');
        $this->assertNotEquals($this->class->postData('test'), 'test2');
    }

    public function testPostExists()
    {
        $this->assertTrue($this->class->postExists('test'));
        $this->assertFalse($this->class->postExists('test2'));
    }

    public function testRequestURI()
    {
        $this->assertEquals($this->class->requestURI(), $_SERVER['REQUEST_URI']);
    }

    protected function tearDown()
    {
      unset($_COOKIE);
      unset($_GET);
      unset($_SERVER);
      unset($_POST);
      unset($_SERVER);
    }
}
