<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\KeepinhoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/teste', function(){
//     return view('teste');
// });

Route::get('/teste/{valor}', function($valor){
    return "Você digitou: {$valor}";
});

// Desenvolver uma rota chamada "soma", que receba dois valores e apresente a soma desses dois

// Route::get('/soma/{valor1}/{valor2}', function($valor1, $valor2){
//     return "A soma dos dois valores digitados é: " . $valor1 + $valor2;
// });

// Cálculos
Route::get('/calc/soma/{x}/{y}', [CalculosController::class, 'soma']);
Route::get('/calc/subtracao/{x}/{y}', [CalculosController::class, 'subtracao']);
Route::get('/calc/multiplicacao/{x}/{y}', [CalculosController::class, 'multiplicacao']);
Route::get('/calc/divisao/{x}/{y}', [CalculosController::class, 'divisao']);

// Criar a rota e a função na controller para o "quadrado" -> Elevar um único num ao quadrado

Route::get('/calc/quadrado/{x}', [CalculosController::class, 'quadrado']);

// Keepinho
// Agrupamento de rotas
Route::prefix('/keep')->group(function () {
    Route::get('/', [KeepinhoController::class,'index']);
});