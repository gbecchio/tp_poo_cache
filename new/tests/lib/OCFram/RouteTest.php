<?php
// namespaces tests;
use OCFram\Route;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class RouteTest extends PHPUnit_Framework_TestCase
{
    private $classe;

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

        $this->classe = new Route($this->url, $this->module, $this->action, $this->varsNames);
    }

    public function testHasVars()
    {
        $this->assertTrue($this->classe->hasVars());
    }

    public function testMatch()
    {
        $this->assertEquals($this->classe->match($this->url), array($this->url));
    }

    public function testAction()
    {
        $this->assertEquals($this->classe->action(), $this->action);
        $this->classe->setAction('nouvelle_action');
        $this->assertEquals($this->classe->action(), 'nouvelle_action');
        $this->classe->setAction(0);
        $this->assertEquals($this->classe->action(), 'nouvelle_action');
        $this->classe->setAction(null);
        $this->assertEquals($this->classe->action(), 'nouvelle_action');
    }

    public function testModule()
    {
        $this->assertEquals($this->classe->module(), $this->module);
        $this->classe->setModule('nouveau_module');
        $this->assertEquals($this->classe->module(), 'nouveau_module');
        $this->classe->setModule(0);
        $this->assertEquals($this->classe->module(), 'nouveau_module');
        $this->classe->setModule(null);
        $this->assertEquals($this->classe->module(), 'nouveau_module');
    }

    public function testVars()
    {
        $this->assertEquals($this->classe->vars(), $this->vars);
        $this->classe->setVars(array('var1','var2'));
        $this->assertEquals($this->classe->vars(), array('var1','var2'));
    }

    public function testVarsNames()
    {
        $this->assertEquals($this->classe->varsNames(), $this->varsNames);
        $this->classe->setVarsNames(array('var1','var2'));
        $this->assertEquals($this->classe->varsNames(), array('var1','var2'));
    }

    protected function tearDown()
    {
      unset($this->classe);
    }
}