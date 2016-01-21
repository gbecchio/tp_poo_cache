<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

function debutElement($parser, $nom, $attributs)
{
    echo "Début élément : $nom\n";
    echo "Nombre d'attributs : ".count($attributs);
}
function finElement($parser, $nom)
{
    echo "Fin élément $nom\n";
}

$parseur = xml_parser_create();
var_dump(xml_set_element_handler($parseur, 'debutElement', 'finElement'));