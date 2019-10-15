<?php

namespace Feday2\SerializeObject;

final class SerializeJson extends AbstractSerialize implements SerializeInterface
{

    public function encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        return \json_encode($properties);
    }

}