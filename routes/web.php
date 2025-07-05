<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
Cache::remember('test', 600, function () {
    return "TEST value";
});
    // Cache::put('test', 'hello redis', 600);
    return view('welcome');
});
