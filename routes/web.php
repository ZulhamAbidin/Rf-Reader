<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/gerbang-absensis/{record}/view', [GerbangAbsensiResource::class, 'view'])
//     ->name('filament.resources.gerbang-absensis.view');
