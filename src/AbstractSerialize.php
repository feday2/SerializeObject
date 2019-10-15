<?php

namespace Feday2\SerializeObject;

use Feday2\SerializeObject\Errors\NotSupportedTypeError;

abstract class AbstractSerialize implements SerializeInterface
{

    const SUPPORT_TYPES = ['integer', 'boolean', 'NULL', 'string', 'double'];

    public function getProperties($object)
    {
        if ( !\is_object($object) ) {
            throw new NotSupportedTypeError('Parameter 1 must be object, '.\gettype($object).' given');
        }
        return \get_object_vars($object);
    }

    public function ensureIsSupportedTypes(array $array)
    {
        foreach ( $array as $el ) {
            $type = \gettype($el);
            if ( $type == 'array' ) {
                $this->ensureIsSupportedTypes($el);
            } elseif ( !\in_array($type, self::SUPPORT_TYPES) ) {
                throw new NotSupportedTypeError('data type "'.$type.'" not supported');
            }
        }
    }

}