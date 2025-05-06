<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class KeepinhoController extends Controller
{
    public function index(){
        $notas = Nota::all();

        return view("keepinho/index", [
            "notas"=> $notas
        ]);
    }
    public function gravar(Request $request){
        // Cria uma nota com todos os valores enviados pelo form. Porém, a model vai fica apenas com aqueles listados no $fillable
        Nota::create($request->all());
        return redirect()->route('keep');
    }
    // o Nota $nota busca diretamente do banco o id da model Nota -> tipagem da $nota
    public function editar(Nota $nota, Request $request){
        if($request->isMethod('put')){
            $nota = Nota::find($request->id);
            $nota->texto = $request->texto;
            $nota->save();
            return redirect()->route('keep');
        }

        return view('keepinho.editar', ['nota' => $nota]);
    }

}
