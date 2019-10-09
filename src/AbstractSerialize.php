<?php

require_once __DIR__ . '/SerializeInterface.php';

abstract class AbstractSerialize implements SerializeInterface
{

    public function getProperties($object)
    {
        return get_object_vars($object);
    }

}