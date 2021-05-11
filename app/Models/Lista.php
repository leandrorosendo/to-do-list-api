<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id','ds_lista' , 'fl_realizado'];

    /**
     * Buscar Lista no banco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }


    /**
     * Escopo para filtrar itens da lista que foram realizados em ordem crescente 
     *
     * @param $query
     *
     * @return mixed
     */
    public function realizados($query)
    {
        return $query->where('fl_realizado', true)->orderBy('ds_lista', 'ASC');
    }
}
