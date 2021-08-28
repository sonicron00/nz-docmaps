<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HutController;


Route::get('/hut-points', [HutController::class, 'getHutMarkers']);
