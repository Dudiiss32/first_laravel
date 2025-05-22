<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
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
    public function gravar(NotaRequest $request){
        // Fazendo uma validação dos campos

        $dados = $request->validated();

        // $dados = $request->validate([
        //     "titulo"=> "required|min:3|max:255", // |min:3 pelo menos 3 caracteres
        //     "texto"=> "required",
        // ]);

        // Cria uma nota com todos os valores enviados pelo form. Porém, a model vai fica apenas com aqueles listados no $fillable
        Nota::create($dados);
        return redirect()->route('keep');
    }
    // o Nota $nota busca diretamente do banco o id da model Nota -> tipagem da $nota
    public function editar(Nota $nota, NotaRequest $request){
        if($request->isMethod('put')){
            $nota = Nota::find($request->id);
            $nota->fill($request->all());
            $nota->save();
            return redirect()->route('keep');
        }

        return view('keepinho.editar', ['nota' => $nota]);
    }

    public function apagar(Nota $nota){
        $nota->delete();
        return redirect()->route('keep');
    }
    public function lixeira(){
        $notas = Nota::onlyTrashed()->get(); // apenas as apagadas, todas as consultas tem q dar get no final, menos o all()
        // $notas = Nota::trashed(); // trashed pega td q ta na lixeira do bd
        // $notas = Nota::withTrashed(); // todas as notas e com as apagadas
        return view('keepinho.lixeira', ['notasApagadas' => $notas]);
    }
    public function restaurar($nota){
        $nota = Nota::withTrashed()->find($nota);
        $nota->restore();
        return redirect()->route('keep.lixeira')->with('success','Nota restaurada com sucesso');
    }
}
