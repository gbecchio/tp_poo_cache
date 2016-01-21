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

$dom = new DOMDocument;
$dom->loadXML($xml);
if (!$dom) {
    echo 'Erreur durant l\'analyse du document';
    exit;
}

echo "<pre>";
$s = simplexml_import_dom($dom);
echo $s->chapitre[1]->ho;

$simplexml = new SimpleXMLElement($xml);
$dom2 = dom_import_simplexml($simplexml->chapitre[0]);
var_dump($dom2->getNodePath('id'));
var_dump($dom2->getAttribute('id'));