<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tokencontroller;
use App\Http\Controllers\AgendaController;



Route::get('/teste',[AgendaController::class ,'cadastrar']);



Route::group(['middleware' => ['JWTToken']], function () {
});



