<?php
setcookie("TestCookie", 'test1', time()+120);
class HTTPRequestTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        global $_COOKIE;
        $_COOKIE['test'] = 'test';
    }

    public function testCookieData()
    {
         $this->assertEquals($_COOKIE['test'], 'test');
    }

    protected function tearDown()
    {
      unset($_COOKIE);
    }
}
