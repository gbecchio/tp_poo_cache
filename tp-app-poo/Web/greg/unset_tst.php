<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

function destroy_foo() 
{
    global $foo;
    unset($foo);
}

function destroy_baz() 
{
    global $baz;
    unset($GLOBALS['baz']);
}
$foo = 'bar';
$baz = 'baz';
destroy_foo();
echo $foo;
destroy_baz();
var_dump($baz);