<?php

/**
 * Hostinger Deployment Helper
 * This script runs migrations and clears cache without SSH access.
 * USAGE: Visit yourdomain.com/install.php once, then DELETE this file.
 */

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

// 1. Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// 2. Execute Commands
$kernel = $app->make(Kernel::class);
$kernel->bootstrap(); // <--- ADDED THIS TO FIX FACADE ERROR

echo "<h1>ClassicWeld Deployment Helper</h1>";

try {
    echo "<p>Running migrations...</p>";
    $exitCode = Artisan::call('migrate', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";
    echo "<p>Migration exit code: $exitCode</p>";

    echo "<p>Clearing config cache...</p>";
    Artisan::call('config:clear');
    echo "<p>Config cleared.</p>";

    echo "<p>Clearing view cache (to reflect HTML changes)...</p>";
    Artisan::call('view:clear');
    echo "<p>View cache cleared.</p>";

    echo "<p>Clearing general cache...</p>";
    Artisan::call('cache:clear');
    echo "<p>General cache cleared.</p>";

    echo "<h2 style='color:green'>Done! Please Refresh your homepage. If it still doesn't show, click 'Deploy' in Hostinger Git settings.</h2>";
    echo "<p>Remember to DELETE this file (install.php) from your server when finished.</p>";

} catch (\Exception $e) {
    echo "<h2 style='color:red'>Error during setup:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
