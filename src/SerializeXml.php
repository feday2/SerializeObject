<?php

require_once __DIR__ . '/AbstractSerialize.php';

final class SerializeXml extends AbstractSerialize implements SerializeInterface
{

    const SUPPORT_TYPES = ['integer', 'boolean', 'NULL', 'string', 'double'];

    private function checkTypesSupport(array $array)
    {
        foreach ($array as $el) {
            $type = gettype($el);
            if ( $type == 'array' ) {
                $this->checkTypesSupport($el);
            } elseif ( !in_array($type, $this->supportTypes ) ) {
                throw new Exception('data type "'.$type.'" not supported');
            }
        }
    }

    private function beautyXML($xmlStr)
    {
        $domObj = new DOMDocument();
        $domObj->formatOutput = true;
        $domObj->loadXML($xmlStr);
        return $domObj->saveXML();
    }

    private function addToXML($array, SimpleXMLElement $xmlObj)
    {
        foreach ($array as $key => $el) {
            if ( gettype($el) == 'array') {
                $child = $xmlObj->addChild('items');
                $child->addAttribute('name', $key);
                $this->addToXML($el, $child);
                continue;
            }
            if  (gettype($el) !== 'string') {
                $el = var_export($el, true);
            }
            $child = $xmlObj->addChild('item', $el);
            $child->addAttribute('name', $key);
        }
    }

    public function Encode($object)
    {
        $properties = $this->getProperties($object);
        $this->checkTypesSupport($properties);
        $xml = new SimpleXMLElement('<'.get_class($object).'/>');
        $this->addToXML($properties, $xml);
        $xmlData = $this->beautyXML($xml->asXML());
        return $xmlData;
    }

}