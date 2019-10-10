<?php

require_once __DIR__ . '/AbstractSerialize.php';

final class SerializeJson extends AbstractSerialize implements SerializeInterface
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

    public function Encode($object)
    {
        $properties = $this->getProperties($object);
        $this->checkTypesSupport($properties);
        return json_encode($properties);
    }

}