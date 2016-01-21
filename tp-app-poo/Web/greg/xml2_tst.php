<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$xml = <<<XML
<?xml version='1.0' encoding='UTF-8'?>
<livre>
    <titre>ertification PHP 5.5</titre>
    <chapitre id="3">
        <id>3</id>
        <titre>Formats et types de données</titre>
        <description>Gestion XML, JSON, Date et heure et introduction aux services web REST et SOAP</description>
    </chapitre>
    <a>
</livre>
XML;

function debutElement($parseur, $nom, $attributs)
{
    echo "* Début élément : $nom<br />";
    $nbAttributs = count($attributs);
    echo "- Nombre d'attibuts : $nbAttributs<br />";
    if($nbAttributs > 0)
    {
        print_r($attributs);
        echo "<br />";
    }
    return 10;
}

function finElement($parseur, $nom)
{
    echo "Fin élément cool du XML $nom<br/><br/>";
    return 20;
}

$parseur = xml_parser_create();
xml_set_element_handler($parseur, 'debutElement', 'finElement');
echo xml_parse($parseur, $xml, true);
var_dump(xml_get_error_code($parseur));
echo "<br>".xml_error_string(xml_get_error_code($parseur));
$ord = ord(' ');
echo "<br>".decbin($ord);