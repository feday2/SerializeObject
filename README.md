# Serialize object
Serialize public properties of object to JSON, YAML or XML

## Installation ##
```bash
$ composer require feday2/serialize-object
```

## Usage ##
```php
<?php

use Feday2\SerializeObject\{SerializeJson, SerializeXml, SerializeYaml};

...

$serializeJson = new SerializeJson();
$serializeXml = new SerializeXml();
$serializeYaml = new SerializeYaml();

$json = $serializeJson->encode($test);
$xml = $serializeXml->encode($test);
$yml = $serializeYaml->encode($test);
```
## Support types ##
Library supports next types of object properties:

* String
* Integer
* Double
* Boolean
* Array
* Null
