<?php

$applyMitigation = false;

$xml = <<<XML
<?xml version="1.0" encoding="ISO-8859-1"?> 

<!DOCTYPE foo [   

<!ELEMENT foo ANY > 

<!ENTITY xxe SYSTEM "file:///etc/passwd" >]><foo>&xxe;</foo> 

XML;

try {

    $doc = new DOMDocument();

    if ($applyMitigation !== false) {

        libxml_disable_entity_loader();

    }

    $doc->validateOnParse = true;

    if (false === $doc->loadXML($xml)) {

        throw new Exception("That XML string is not well-formed");

    }

    $foo = $doc->getElementsByTagName('foo');

    foreach ($foo as $element) {

        var_dump($element);

    }

} catch (Exception $e) {

    echo "That XML string is not well-formed";

}