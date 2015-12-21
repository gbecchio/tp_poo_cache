<?php
namespace OCFram;

class PDOFactory
{
  public static function getMysqlConnexion()
  {
    # $db = new \PDO('mysql:host=192.168.220.11;dbname=news', 'root', 'greg');
    $db = new \PDO('mysql:host=192.168.2.1;dbname=news', 'root', 'root');
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    return $db;
  }
}