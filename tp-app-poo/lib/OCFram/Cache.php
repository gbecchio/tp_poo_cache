<?php
namespace OCFram;

abstract class Cache
{
  public $dateExpiration;
  protected $fileName;
  const BASE_PATH = '/tmp/cache/';

  abstract public function getCache($fileName);

  abstract public function createCache($fileName, $input);


  public function setDateExpiration($val)
  {
    $this->dateExpiration = $val;
  }
  
  public function getDateExpiration()
  {
    return $this->dateExpiration;
  }
}