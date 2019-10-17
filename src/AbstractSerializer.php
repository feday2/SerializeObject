<?php

namespace Feday2\SerializeObject;

use Feday2\SerializeObject\Exceptions\NotSupportedTypeExceptions;

abstract class AbstractSerializer implements SerializerInterface
{

    const SUPPORT_TYPES = ['integer', 'boolean', 'NULL', 'string', 'double'];

    protected function getProperties($object)
    {
        if (!\is_object($object)) {
            throw new NotSupportedTypeExceptions('Parameter 1 must be object, '.\gettype($object).' given');
        }
        return \get_object_vars($object);
    }

    protected function ensureIsSupportedTypes(array $array)
    {
        foreach ($array as $el) {
            $type = \gettype($el);
            if ($type == 'array') {
                $this->ensureIsSupportedTypes($el);
            } elseif (!\in_array($type, self::SUPPORT_TYPES)) {
                throw new NotSupportedTypeExceptions('data type "'.$type.'" not supported');
            }
        }
    }

}