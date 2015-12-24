<?php
// namespaces tests;
use OCFram\Route;
use OCFram\Router;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class RouterTest extends PHPUnit_Framework_TestCase
{
    private $classe;

    private $route;
    private $url;
    private $module;
    private $action;
    private $varsNames = array();
    private $vars = array();

    protected function setUp()
    {
        $this->url = "http://www.google.fr";
        $this->module = "module";
        $this->action = "action";
        $this->varsNames = array('a'=>1, 'b'=>2);
        $this->route = new Route($this->url, $this->module, $this->action, $this->varsNames);

        $this->classe = new Router();
        $this->classe->addRoute($this->route);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testGetRoute()
    {
        $this->assertEquals($this->classe->getRoute($this->url), $this->route);
        $this->assertEquals($this->classe->getRoute('0'), $this->route);
    }

    protected function tearDown()
    {
      unset($this->classe);
    }
}