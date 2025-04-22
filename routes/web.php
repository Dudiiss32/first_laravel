<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function(){
    return view('teste');
});

Route::get('/teste/{valor}', function($valor){
    return "Você digitou: {$valor}";
});

// Desenvolver uma rota chamada "soma", que receba dois valores e apresente a soma desses dois

// Route::get('/soma/{valor1}/{valor2}', function($valor1, $valor2){
//     return "A soma dos dois valores digitados é: " . $valor1 + $valor2;
// });

// Cálculos
Route::