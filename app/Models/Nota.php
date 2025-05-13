<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    // Listagem de campos para inserção no campo
    protected $fillable = [
        "titulo","texto",
    ];
}
