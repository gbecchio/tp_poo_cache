<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$json = <<<JSON
{
    "a":1,
    "b":2,
    "c":3,
    "d":4,
    "e":5
}
JSON;

echo "<pre>";

var_dump(json_decode($json));
var_dump(json_decode($json, true));