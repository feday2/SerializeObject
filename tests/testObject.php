<?php

require_once __DIR__ . '/../src/SerializeJson.php';
require_once __DIR__ . '/../src/SerializeXml.php';
// require_once __DIR__ . '/../src/SerializeYaml.php';

use app\{SerializeJson, SerializeXml, SerializeYaml};


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
$ser1 = new SerializeJson();
$ser2 = new SerializeXml();
// $ser3 = new SerializeYaml();

$json = $ser1->Encode($test);
$xml = $ser2->Encode($test);
// $yml = $ser3->Encode($test);




echo '----------------YAML---------------------'. PHP_EOL;
// echo $yml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------XML------------------------'. PHP_EOL;
echo $xml. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;
echo '----------------JSON-----------------------'. PHP_EOL;
echo $json. PHP_EOL;
echo '-------------------------------------------'. PHP_EOL;