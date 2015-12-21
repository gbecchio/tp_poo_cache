<?php
namespace OCFram;

class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $expirationDate;
  protected $vars = [];

  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value;
  }

  public function getGeneratedPage()
  {
    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    $user = $this->app->user();

    extract($this->vars);
    
    $tab_module = explode('/', $this->contentFile);
    // array_pop(array_pop(array_pop($tab_module)));
    $module = $tab_module[count($tab_module) - 3];
    $file_name = $this->app->name() . '_' . $module . '_' . basename($this->contentFile, ".php");

    ob_start();
    require $this->contentFile;
    $content = ob_get_clean();

    ob_start();
    $cache = new \OCFram\CacheViews();
    $cache->getCache($file_name);
    $temp = $cache->getDateExpiration();
    if (basename($this->contentFile, ".php") == 'insertComment' 
      OR basename($this->contentFile, ".php") == 'updateComment'
      OR basename($this->contentFile, ".php") == 'insert' 
      OR basename($this->contentFile, ".php") == 'update'
    )
    {
      require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
      $temp = ob_get_clean();

      $path = '/tmp/cache/views/';
      exec("rm -rf {$path}");

    }
    else if ($temp)
    {
      $temp = $cache->getCache($file_name);
    }
    else
    {
      require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
      $cache->setDateExpiration(time() + (60));
      $temp = ob_get_clean();
      $cache->createCache($file_name, $temp);
    }
    return $temp;
  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }
  public function setExpirationDate($expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
}