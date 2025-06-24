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
   
    public function store(Produto $id)
    {
        session()->push('carrinho', $id);
        return redirect()->route('carrinho.index');
    }
    public function delete(Produto $produto)
    {
        session()->pull('carrinho', $produto->id);
        return redirect('carrinho.index');
    }
}
