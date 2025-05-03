<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $pdo = Illuminate\Support\Facades\DB::connection()->getPdo();
    echo "✅ Conectado a: ".config('database.connections.mysql.database');
} catch (Exception $e) {
    echo "❌ Error: ".$e->getMessage();
}