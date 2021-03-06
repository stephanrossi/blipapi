<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/client/{cnpj}', [ClienteController::class, 'listOne']);
Route::get('/clients', [ClienteController::class, 'listAll']);

Route::get('/ping', [ClienteController::class, 'ping']);
