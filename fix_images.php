<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$setting = \App\Models\Setting::where('key', 'hero_image')->first();
if ($setting && !empty($setting->value)) {
    $value = $setting->value;
    // Check if it's already JSON
    $decoded = json_decode($value, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
        // It's a single string, convert to array
        $setting->value = [$value]; // Filament handles array to json if casted, but we'll save it as array if model allows
        $setting->save();
        echo "Data converted from single string to array successfully.\n";
    } else {
        echo "Data is already in array format.\n";
    }
} else {
    echo "No setting found or value is empty.\n";
}
