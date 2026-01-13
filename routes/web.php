<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DockerInfoController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/docker/info', [DockerInfoController::class, 'info'])->name('docker.info');
