<?php

namespace Feday2\SerializeObject;

final class SerializeXml extends AbstractSerialize implements SerializeInterface
{

    private function beautyXML($xmlStr)
    {
        $domObj = new \DOMDocument();
        $domObj->formatOutput = true;
        $domObj->loadXML($xmlStr);
        return $domObj->saveXML();
    }

    private function addToXML($array, \SimpleXMLElement $xmlObj)
    {
        foreach ($array as $key => $el) {
            if ( gettype($el) == 'array') {
                $child = $xmlObj->addChild('items');
                $child->addAttribute('name', $key);
                $this->addToXML($el, $child);
                continue;
            }
            if  (gettype($el) !== 'string') {
                $el = \var_export($el, true);
            }
            $child = $xmlObj->addChild('item', $el);
            $child->addAttribute('name', $key);
        }
    }

    public function Encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        $xml = new \SimpleXMLElement('<'.get_class($object).'/>');
        $this->addToXML($properties, $xml);
        $xmlData = $this->beautyXML($xml->asXML());
        return $xmlData;
    }

}