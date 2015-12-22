<?php
class HTTPRequestTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        global $_COOKIE;
        $_COOKIE['test'] = 'test';
    }

    public function testCookieData()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertEquals($_COOKIE['test'], 'test');
    }

    protected function tearDown()
    {
      unset($_COOKIE);
    }
}