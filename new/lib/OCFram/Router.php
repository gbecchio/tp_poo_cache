<?php
namespace OCFram;

class Router
{
  protected $routes=array();

  public function addRoute(Route $route)
  {
    if(!in_array($route, $this->routes))
    {
      $this->routes[] = $route;
    }
  }
  public function getRoute($url)
  {

  }
}