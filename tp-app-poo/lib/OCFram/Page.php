<?php
namespace OCFram;

class Page extends ApplicationComponent
{
  protected $contentFile;
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

    ob_start();
      echo 'pas content du tout';
    $pas_content = ob_get_clean();
    
    $tab_module = explode('/', $this->contentFile);
    // array_pop(array_pop(array_pop($tab_module)));
    $module = $tab_module[count($tab_module) - 3];
    $path_cache = '/tmp/cache/views/' . $this->app->name() . '_' . $module . '_' . basename($this->contentFile, ".php");
    if (is_file($path_cache)){
      ob_start();
      require $path_cache;
      $content = ob_get_clean();
      var_dump('sldghlkdsgj');
    }
    else {
      ob_start();
      require $this->contentFile;
      $content = ob_get_clean();
      var_dump('/tmp/cache/views/' . $this->app->name() . '_' . basename($this->contentFile, ".php"));
      $fp = fopen('/tmp/cache/views/' . $this->app->name() . '_' . $module . '_' . basename($this->contentFile, ".php"), 'w');
      fwrite($fp, $content);
      fclose($fp);
    }

    ob_start();
      require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
    return ob_get_clean();
  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }
}