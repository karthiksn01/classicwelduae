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

    echo "<p>Creating storage link...</p>";
    // On some shared hosts, symlink() might be disabled. We try it anyway.
    try {
        Artisan::call('storage:link');
        echo "<p>Storage link created.</p>";
    } catch (\Exception $e) {
        echo "<p style='color:orange'>Storage link skipped: " . $e->getMessage() . "</p>";
    }

    echo "<h2 style='color:green'>Done! Please DELETE this file (install.php) from your server now.</h2>";

} catch (\Exception $e) {
    echo "<h2 style='color:red'>Error during setup:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
