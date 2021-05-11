<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nm_usuario'];

    /**
     * Buscar Usuarios no banco
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listas()
    {
        return $this->hasMany(lista::class);
    }
  
}
