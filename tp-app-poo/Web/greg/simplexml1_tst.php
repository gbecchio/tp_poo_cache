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
    <chapitre>
        <ho>
            a
        </ho>
    </chapitre>
</livre>
XML;

$xml_file = __DIR__."/un.xml";
$simplexml = simplexml_load_file($xml_file);
echo "<pre>";
print_r($simplexml);
echo $simplexml->chapitre->id;

$xml_construct1 = new SimpleXMLElement($xml);
var_dump($xml_construct1);

$xml_construct = new SimpleXMLElement($xml_file, 0, 1);

$attr = $xml_construct->chapitre->attributes();
foreach($attr as $key=>$val)
{
    var_dump($key);
    var_dump($val);
}

echo $xml_construct->getName();

var_dump($xml_construct->chapitre->children());

var_dump($xml_construct->count());


$a = $xml_construct;
var_dump($a->count());
foreach($a as $key=>$val)
{
    var_dump($val->count());
}

var_dump($xml_construct->asXML(__DIR__.'/xml/toto_la_praline.xml'));
echo $xml_construct->asXML();

$res = $xml_construct1->xpath("/livre/chapitre");

foreach($res as $key=>$val)
{
    echo $key." =>";
    var_dump($val);
    echo "<br/>";
    echo "<br/>";
}
echo "---------------------";
var_dump($res[1]->asXML(__DIR__.'/xml/tata.xml'));