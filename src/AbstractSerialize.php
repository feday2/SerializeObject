<?php

require_once __DIR__ . '/SerializeInterface.php';

abstract class AbstractSerialize implements SerializeInterface
{

    const SUPPORT_TYPES = ['integer', 'boolean', 'NULL', 'string', 'double'];

    public function getProperties($object)
    {
        return get_object_vars($object);
    }

    public function checkTypesSupport(array $array)
    {
        foreach ($array as $el) {
            $type = gettype($el);
            if ( $type == 'array' ) {
                $this->checkTypesSupport($el);
            } elseif ( !in_array($type, self::SUPPORT_TYPES ) ) {
                throw new Exception('data type "'.$type.'" not supported');
            }
        }
    }

}