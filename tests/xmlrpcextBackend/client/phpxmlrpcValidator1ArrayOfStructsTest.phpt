--TEST--
XMLRPCext Backend XML-RPC client against phpxmlrpc validator1 (arrayOfStructsTest)
--SKIPIF--
<?php
if (!function_exists('xmlrpc_server_create')) {
    print "Skip XMLRPC extension unavailable";
}
if (!function_exists('curl_init')) {
    print "Skip CURL extension unavailable";
}
?>
--FILE--
<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$options = array(
    'debug' => false,
    'backend' => 'Xmlrpcext',
    'prefix' => 'validator1.'
);
$client = XML_RPC2_Client::create('https://gggeek.altervista.org/sw/xmlrpc/demo/server/server.php', $options);
$arg = array(
    array(
        'moe' => 5,
        'larry' => 6,
        'curly' => 8
    ),
    array(
        'moe' => 5,
        'larry' => 2,
        'curly' => 4
    ),
    array(
        'moe' => 0,
        'larry' => 1,
        'curly' => 12
    )
);
$result = $client->arrayOfStructsTest($arg);
var_dump($result);

?>
--EXPECT--
int(24)
