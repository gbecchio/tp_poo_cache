<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$tabFct = ['ini_set', 'var_dump', 'unset', 'isset'];
$tabA = list($fct1, $fct2, $fct3, $fct4) = $tabFct;
echo "<pre>";
var_dump($fct1);
var_dump($tabFct);
var_dump($tabA);

$tabBoisson = ['café', 'thé', 'eau'];
list($a[0], $a[1], $a[2]) = $tabBoisson;
var_dump($a);
echo "</pre>";