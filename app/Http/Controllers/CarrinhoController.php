<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(){
        $carrinho = session()->get('carrinho', []);
     
        return view('carrinho.index', compact('carrinho'));
    }
   
    public function store(Produto $produto)
    {
        session()->put("carrinho.{$produto->id}", $produto->attributesToArray());

        return redirect()->route('carrinho.index');
    }

    public function delete(string $produto)
    {
        session()->forget("carrinho.{$produto}");
        return redirect()->route('carrinho.index');
    }

}
