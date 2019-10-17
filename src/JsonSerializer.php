<?php

namespace Feday2\SerializeObject;

final class JsonSerializer extends AbstractSerializer implements SerializerInterface
{

    public function encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        return \json_encode($properties);
    }

}