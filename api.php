<?php
require 'vendor/autoload.php';

use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Api;
use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;

// Konfigurasi koneksi ke database
$config = [
    'driver' => 'mysql',
    'address' => 'localhost',
    'port' => 3306,
    'username' => 'root',
    'password' => '',
    'database' => 'larissa_jaya',
    'debug' => true,
];

// Jalankan API
$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$api = new Api($config);
$response = $api->handle($request);

// Kirim respon ke browser
http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $response->getBody();
