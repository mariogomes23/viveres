<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VivereController;
use Illuminate\Support\Facades\Route;




Route::middleware("auth")->group(function(){
    Route::resource("viveres",VivereController::class);
    Route::resource("tipo",TipoController::class);
    Route::resource("user",UserController::class);
    Route::get('/', [HomeController::class,"painel"])->name("painel");

    Route::get("/relatorio",[HomeController::class,"relatorioSubmit"])->name("relatorio");


});






require __DIR__.'/auth.php';
