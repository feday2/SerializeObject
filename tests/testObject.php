<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Feday2\SerializeObject\{JsonSerializer, XmlSerializer, YamlSerializer};

class testObject
{
    public $varArray = [ '0hello' => ['0aasdf' => 'asdf', 12 => '123'], 12 => 'test' ];
    public $varStr = '   li\nl"al"u\'\'l';
    public $varBull = false;
    public $varInt = 47.24;
    public $varNull = NULL;
    public $varNoInit;
}

$test = new testObject();
$ser1 = new JsonSerializer();
$ser2 = new XmlSerializer();
$ser3 = new YamlSerializer();
$json = $ser1->encode($test);
$xml = $ser2->encode($test);
$yml = $ser3->encode($test);

echo '----------------YAML---------------------'. PHP_EOL;
echo $yml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------XML------------------------'. PHP_EOL;
echo $xml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------JSON-----------------------'. PHP_EOL;
echo $json. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;