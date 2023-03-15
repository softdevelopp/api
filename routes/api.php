<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcidController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/orcid/create/', [OrcidController::class, 'createOrcid']);

Route::delete('/orcid/delete/{orcid}', [OrcidController::class, 'deleteOrcid']);

Route::get('/orcid/list', [OrcidController::class, 'getAllOrcid']);

Route::get('/orcid/{orcid}', [OrcidController::class, 'getOrcidDetail']);