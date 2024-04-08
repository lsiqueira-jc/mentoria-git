<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tokencontroller;
use App\Http\Controllers\AgendaController;





Route::get('/',[AgendaController::class ,'listar']);

Route::get('/{id}',[AgendaController::class ,'show']);

Route::put('/{id}',[AgendaController::class ,'atualizar']);

Route::delete('/{id}',[AgendaController::class ,'delete']);





Route::post('/logar',[Tokencontroller::class ,'index']);


Route::group(['middleware' => ['JWTToken']], function () {

  Route::post('/',[AgendaController::class ,'cadastrar']);

});



