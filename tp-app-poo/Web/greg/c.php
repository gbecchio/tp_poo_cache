<?php
$a = `ls -al /`;
$a = nl2br($a);
echo $a;
$a = `ifconfig`;
$a = nl2br($a);
echo $a;
$a = `pwd`;
$a = nl2br($a);
echo $a;