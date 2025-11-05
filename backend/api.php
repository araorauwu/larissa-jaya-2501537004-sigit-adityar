<?php
require __DIR__ . '/phpcrudapi/vendor/autoload.php';

use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

$config = new Config([
    'username' => 'root',
    'password' => '',
    'database' => 'larissa_jaya',
    'address'  => 'localhost',
]);

$api = new Api($config);
$response = $api->handle(RequestFactory::fromGlobals());
ResponseUtils::output($response);
