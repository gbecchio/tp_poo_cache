<?php
// namespaces tests;
use OCFram\Route;
use OCFram\Router;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class BackControllerTest extends PHPUnit_Framework_TestCase
{
    private $classe;

    private $app;
    private $module;
    private $action;
    private $page;

    protected function setUp()
    {
        $this->module = 'module';
        $this->action = 'action';
        $this->app = $this->getMockForAbstractClass('OCFram\\Application');
        $this->app->expects($this->any())
            ->method('run')
            ->will($this->returnValue(TRUE));
        
        $this->classe = $this->getMockBuilder('OCFram\\BackController')
            ->setConstructorArgs(array($this->app, $this->module, $this->action))
            ->getMockForAbstractClass();
        // $this->classe->execute();

        // $this->page = new OCFram\\Page();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testPage()
    {
        $this->markTestSkipped (
          'The Page class is not available.'
        );
    }

    protected function tearDown()
    {
      unset($this->classe);
    }
}