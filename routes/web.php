<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Keepinho
// Agrupamento de rotas
Route::prefix('/keep')->group(function () {
    Route::get('/', [KeepinhoController::class,'index'])->name('keep');

    Route::post('/gravar', [KeepinhoController::class,'gravar'])->name('keep.gravar'); // a url fica: /keep/gravar
    Route::get('/editar/{nota}', [KeepinhoController::class,'editar'])->name('keep.editar'); //Formulário de mostrar a nota para editar
    Route::put('/editar', [KeepinhoController::class, 'editar'])->name('keep.editarGravar'); //Ação/ efetivamente editar a nota
    Route::delete('/apagar/{nota}', [KeepinhoController::class,'apagar'])->name('keep.apagar');
    Route::get('/lixeira', [KeepinhoController::class,'lixeira'])->name('keep.lixeira');
    Route::get('/restaurar{nota}', [KeepinhoController::class,'restaurar'])->name('keep.restaurar');
});

Route::resource('produtos', ProdutosController::class);

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('/carrinho/create', [CarrinhoController::class, 'store'])->name('carrinho.store');
Route::get('/carrinho/store/{produto}', [CarrinhoController::class, 'store'])->name('carrinho.store');
Route::get('/carrinho/delete/{produto}', [CarrinhoController::class, 'delete'])->name('carrinho.delete');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/store/{produto}', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/delete/{produto}', [BlogController::class, 'delete'])->name('blog.delete');

require __DIR__.'/auth.php';


// Route::get('/teste/{valor}', function($valor){
//     return "Você digitou: {$valor}";
// });

// Desenvolver uma rota chamada "soma", que receba dois valores e apresente a soma desses dois

// Route::get('/soma/{valor1}/{valor2}', function($valor1, $valor2){
//     return "A soma dos dois valores digitados é: " . $valor1 + $valor2;
// });

// Cálculos
// Route::get('/calc/soma/{x}/{y}', [CalculosController::class, 'soma']);
// Route::get('/calc/subtracao/{x}/{y}', [CalculosController::class, 'subtracao']);
// Route::get('/calc/multiplicacao/{x}/{y}', [CalculosController::class, 'multiplicacao']);
// Route::get('/calc/divisao/{x}/{y}', [CalculosController::class, 'divisao']);

// // Criar a rota e a função na controller para o "quadrado" -> Elevar um único num ao quadrado

// Route::get('/calc/quadrado/{x}', [CalculosController::class, 'quadrado']);



// Route::get('/autenticar', [AutenticaController::class, 'index'])->name('autentica');
// Route::post('/autenticar/gravar', [AutenticaController::class, 'gravar'])->name('autentica.gravar');
// Route::get('/autenticar/login', [AutenticaController::class, 'login'])->name('autentica.login');
// Route::post('/autenticar/login', [AutenticaController::class, 'login']);
