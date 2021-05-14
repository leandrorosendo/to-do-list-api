<?php

namespace App\Http\Controllers;

use App\Services\ListaService;
use App\Http\Requests\ListaFormRequest;
use App\Http\Requests\ListaFormRequestCreate;
use App\Http\Requests\ListaFormRequestUpdate;


class ListaController extends Controller
{
    // private ListaService $service;

    /**
     * ListaController constructor. 
     *
     * @param ListaService $service
     */
    public function __construct(ListaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->service->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ListaFormRequestCreate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListaFormRequestCreate $request)
    {
        return  $this->service->save($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ListaFormRequestUpdate  $request
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListaFormRequestUpdate $request,  $id)
    {
        return  $this->service->update($request->validated(), $id);
    }

    /**
     * Display the specified resource.
     * só estou usando o ListaFormRequest para travar a chamada de ids que nao existem
     * @param  ListaFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(ListaFormRequest  $request, $id)
    {
        return  $this->service->show($id);
    }

    /**
     * Remove the specified resource from storage.
     * só estou usando o ListaFormRequest para travar a chamada de ids que nao existem
     * @param  int  $id
     * @param  ListaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaFormRequest  $request, $id)
    {
        return  $this->service->destroy($id);
    }

    /**
     * done the specified resource from storage.
     *
     * @param  int  $id
     * @param  ListaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function done(ListaFormRequest  $request, $id)
    {
        return  $this->service->done($id);
    }
}
