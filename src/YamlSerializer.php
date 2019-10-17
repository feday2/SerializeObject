<?php

namespace Feday2\SerializeObject;

use Symfony\Component\Yaml\Yaml;

final class YamlSerializer extends AbstractSerializer implements SerializerInterface
{

    public function encode($object)
    {
        $properties = $this->getProperties($object);
        $this->ensureIsSupportedTypes($properties);
        $yaml = Yaml::dump($properties);
        return $yaml;
    }

}