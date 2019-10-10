<?php

namespace app;

require_once __DIR__ . '/SerializeInterface.php';

abstract class AbstractSerialize implements SerializeInterface
{

    const SUPPORT_TYPES = ['integer', 'boolean', 'NULL', 'string', 'double'];

    public function getProperties($object)
    {
        return \get_object_vars($object);
    }

    public function ensureIsSupportedTypes(array $array)
    {
        foreach ($array as $el) {
            $type = \gettype($el);
            if ( $type == 'array' ) {
                $this->ensureIsSupportedTypes($el);
            } elseif ( !\in_array($type, self::SUPPORT_TYPES ) ) {
                throw new Exception('data type "'.$type.'" not supported');
            }
        }
    }

}