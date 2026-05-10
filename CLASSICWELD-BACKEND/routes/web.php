<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'online',
        'message' => 'ClassicWeld API is running.'
    ]);
});
