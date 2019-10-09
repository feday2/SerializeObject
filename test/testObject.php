<?php

require_once __DIR__ . '/../src/SerializeObject.php';

class testObject
{
    public $varArray = [ '0hello' => ['0aasdf' => 'asdf', 12 => '123'], 12 => 'test' ];
    public $varStr = '   li\nl"al"u\'\'l';
    public $varBull = false;
    public $varInt = 47;
    public $varNull = NULL;
    public $varNoInit;
}

$test = new testObject();
$ser = new SerializeObject();

$json = $ser->JsonEncode($test);
$xml = $ser->XmlEncode($test);
$yml = $ser->YamlEncode($test);

echo '----------------YAML-----------------------'. PHP_EOL;
echo $yml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------XML------------------------'. PHP_EOL;
echo $xml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------JSON-----------------------'. PHP_EOL;
echo $json. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;