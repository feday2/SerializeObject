<?php

namespace app;

require_once __DIR__ . '/AbstractSerialize.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

final class SerializeYaml extends AbstractSerialize implements SerializeInterface
{

    public function Encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        $yaml = Yaml::dump($properties);
        return $yaml;
    }

}