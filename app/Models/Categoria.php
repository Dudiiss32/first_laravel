<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    public function produtos():HasMany{
        return $this->hasMany(Produto::class, 'categorias_id');
    }
}
