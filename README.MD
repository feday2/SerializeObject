# Serialize object
Serialize object to JSON, YAML or XML

## Installation ##

    $ git clone https://github.com/feday2/SerializeObject.git
    $ cd SerializeObject
    $ composer install

## Usage ##

    $serializator = new SerializeObject();

    $json = $serializator->JsonEncode($test);
    $xml = $serializator->XmlEncode($test);
    $yml = $serializator->YamlEncode($test);

## Support types ##
Library supports nex types of object properties:

* String
* Integer
* Double
* Boolean
* Array
* Null