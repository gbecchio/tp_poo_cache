<?php
// namespaces tests;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class ApplicationComponentTest extends PHPUnit_Framework_TestCase
{
    private $classe;
    private $app;

    protected function setUp()
    {
        $this->app = $this->getMockForAbstractClass('OCFram\\Application');
        $this->app->expects($this->any())
            ->method('run')
            ->will($this->returnValue(TRUE));
        $this->classe = $this->getMockBuilder('OCFram\\ApplicationComponent')
            ->setConstructorArgs(array($this->app))
            ->getMockForAbstractClass();
    }

    public function testApp()
    {
        $this->assertEquals($this->classe->app(), $this->app);
    }

    protected function tearDown()
    {
      unset($this->classe);
      unset($this->app);
    }
}