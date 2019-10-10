<?php

require_once __DIR__ . '/AbstractSerialize.php';

final class SerializeJson extends AbstractSerialize implements SerializeInterface
{

    public function Encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        return json_encode($properties);
    }

}