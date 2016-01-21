<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$a = "rien_a";
$b = "rien_b";
if($r = include_once "include1.php")
{
    var_dump($r);
}
if(!$r = include_once "include2.php")
{
    var_dump($r);
}
if(!$r = require_once "include2.php")
{
    var_dump($r);
}
echo $a;
echo $b;
$a = new A;