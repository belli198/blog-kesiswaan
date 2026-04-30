<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$setting = \App\Models\Setting::where('key', 'hero_image')->first();
if ($setting) {
    $setting->value = '[]';
    $setting->save();
    echo "Slider images cleared successfully.\n";
} else {
    echo "Hero setting not found.\n";
}
