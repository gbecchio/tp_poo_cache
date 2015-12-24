<?php
// namespaces tests;
use OCFram\HTTPRequest;
use OCFram\HTTPResponse;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class ApplicationTest extends PHPUnit_Framework_TestCase
{
    private $classe;
    private $httpRequest;
    private $httpResponse;
    private $name;

    protected function setUp()
    {
        $this->classe = $this->getMockForAbstractClass('OCFram\\Application');
        $this->classe->expects($this->any())
            ->method('run')
            ->will($this->returnValue(TRUE));
        $this->httpRequest = new HTTPRequest();
        $this->httpResponse = new HTTPResponse();
        $this->name = '';
    }

    public function testHttpRequest()
    {
        $this->assertEquals($this->classe->httpRequest(), $this->httpRequest);
    }

    public function testHttpResponse()
    {
        $this->assertEquals($this->classe->httpResponse(), $this->httpResponse);
    }

    public function testName()
    {
        $this->assertEquals($this->classe->name(), $this->name);
    }

    public function testGetController()
    {
        $this->markTestSkipped (
          'The xml is not available.'
        );
        //$this->assertEquals($this->classe->getController(), $this->name);
    }

    protected function tearDown()
    {
      unset($this->classe);
      unset($this->httpRequest);
      unset($this->httpResponse);
      unset($this->name);
    }
}