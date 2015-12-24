<?php
// namespaces tests;
use OCFram\Application;
use OCFram\HTTPRequest;
use OCFram\HTTPResponse;


//error_reporting(E_ALL);
//ini_set("display_errors", 1);

class ApplicationTest extends PHPUnit_Framework_TestCase
{
    private $class;
    private $httpResponse;
    private $httpRequest;
    private $name;
    private notName;

    protected function setUp()
    {
        $this->httpRequest = new HTTPRequest();
        $this->httpResponse = new HTTPResponse();
        $name = 'google';
        $notName = 'pas';
    }

    public function testHttpRequest()
    {
        $stub = $this->getMockForAbstractClass('Application');
        $stub->expects($this->any())
             ->method('run')
             ->will($this->returnValue(TRUE));

        $this->assertEquals($stub->httpRequest(), $this->httpRequest);
        $this->assertNotEquals($stub->httpRequest(), $this->httpResponse);
    }

    public function testHttpResponse()
    {
        $stub = $this->getMockForAbstractClass('Application');
        $stub->expects($this->any())
             ->method('run')
             ->will($this->returnValue(TRUE));

        $this->assertEquals($stub->httpResponse(), $this->httpResponse);
        $this->assertNotEquals($stub->httpResponse(), $this->httpRequest);
    }

    public function testName()
    {
        $stub = $this->getMockForAbstractClass('Application');
        $stub->expects($this->any())
             ->method('run')
             ->will($this->returnValue(TRUE));

        $this->assertEquals($stub->name(), $this->name);
        $this->assertNotEquals($stub->name(), $this->notName);
    }

    protected function tearDown()
    {
      
    }
}
