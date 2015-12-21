<?php
namespace App\Frontend;

use \OCFram\Application;

class FrontendApplication extends Application
{
  public function __construct()
  {
    parent::__construct();

    $this->name = 'Frontend';
  }

  public function run()
  {
    $controller = $this->getController();
    if (!isset($_GET['id']))
    {
      $controller->execute();
      $this->httpResponse->setPage($controller->page());
    }
    else
    {
      $file_name = 'page_'.$_GET['id'];
      $cache = new \OCFram\CacheDatas();
      
      $cache->getCache('page_'.$_GET['id']);
      
      $temp = $cache->getDateExpiration();
      $temp_time = time();
      if ($temp && $temp < $temp_time)
      {
        $this->httpResponse = unserialize($cache->getCache($file_name));
      }
      else
      {
        $controller->execute();
        $this->httpResponse->setPage($controller->page());
        $a = $this->httpResponse;
        $cache->setDateExpiration(time() + (60));
        $cache->createCache($file_name, $a);
      }
    }
    $this->httpResponse->send();
  }
}