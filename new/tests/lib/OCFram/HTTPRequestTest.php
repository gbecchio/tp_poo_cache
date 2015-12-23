<?php
setcookie("TestCookie", 'test1', time()+120);
ini_set("display_errors",1);
error_reporting(E_ALL); 
class HTTPRequestTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        global $_COOKIE;
        var_dump(setcookie('name', 'fame'));
        $_COOKIE['TestCookie'] = 'test1';
    }

    public function testCookieData()
    {
        $this->assertEquals($_COOKIE['TestCookie'], 'test1');
    }

    protected function tearDown()
    {
        unset($_COOKIE['TestCookie']);
    }
}