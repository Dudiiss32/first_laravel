<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes; // importando vários pedaços de uma classe para "deletar" do banco sem ser definitivo
    // Listagem de campos para inserção no campo
    protected $fillable = [
        "titulo","texto", 
    ];
}
