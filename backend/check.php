<?php
require 'vendor/autoload.php';

echo "<pre>";
print_r(get_declared_classes());
echo "</pre>";

if (class_exists('Tqdev\PhpCrudApi\Config')) {
    echo "✅ Class ditemukan!";
} else {
    echo "❌ Class masih belum terdeteksi!";
}
