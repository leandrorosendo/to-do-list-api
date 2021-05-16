<?php

namespace App\Services;

use App\Models\Lista;

use Illuminate\Database\Eloquent\Collection;

class ListaService
{

    /**
     * Saves a Lista.
     *
     * @param $Lista
     */
    public function save($Lista):Lista
    {
      return  Lista::create($Lista);
    }
    /**
     * Update a Lista.
     *
     * @param $id
     */
    public function update($request, $id)
    {
      $lista = Lista::find($id);
      $lista->fl_realizado = $request['fl_realizado'];
      $lista->usuario_id = $request['usuario_id'];
      $lista->ds_lista = $request['ds_lista'];
      return $lista->save();
      // return $lista->refresh();
    }
    
    /**
     * Destroy a Lista.
     *
     * @param $id
     */
    public function destroy($id)
    {
      return  Lista::destroy($id);
    }

        /**
     * get a Lista.
     *
     * @param $Lista
     */
    public function get():Collection
    {
      return  Lista::with('usuario')->orderBy('id')->get();
    }

    /**
     * Show a Lista.
     *
     * @param $id
     */
    public function show($id):Lista
    {
      return  Lista::find($id);
    }

    
    /**
     * done a Lista.
     *
     * @param $id
     */
    public function done($id)
    {
      $lista = Lista::find($id);
      $lista->fl_realizado = !$lista->fl_realizado ;
      return $lista->save();
    }
    
}