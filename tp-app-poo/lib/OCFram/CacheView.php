<?php
namespace OCFram;

class CacheViews extends Cache
{
  protected $dataSerialized;
  const FOLDER = 'views';

  public function __construct($dateExpiration)
  {
    parent::__construct($dateExpiration);
  }

  public function getCache($file_name)
  {
    return file_get_contents(BASE_PATH.FOLDER.'/'.$file_name);
  }

  public function createCache($file_name, $input)
  {
    return file_put_contents( BASE_PATH.FOLDER.'/'.$file_name, serialize($input)));
  }
}