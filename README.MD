# Serialize object
Serialize object to JSON, YAML or XML

## Installation ##

    $ git clone https://github.com/feday2/SerializeObject.git
    $ cd SerializeObject
    $ composer install

## Usage ##

    $serializator = new SerializeObject();

    $json = $ser->JsonEncode($test);
    $xml = $ser->XmlEncode($test);
    $yml = $ser->YamlEncode($test);

## Support types ##
Library supports nex types of object properties:

* String
* Integer
* double
* Boolean
* Array
* Null