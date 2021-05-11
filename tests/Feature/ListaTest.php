<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Lista;
use Illuminate\Http\Response;

class ListaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveInserirUmaLista()
    {
        $lista = Lista::factory()->make();
     
        $this->postJson(route('listas.store'), $lista->toArray())
        ->assertStatus(Response::HTTP_CREATED);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
     
    }

        /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveAtualizarUmaLista()
    {
        $lista = Lista::factory()->create();
        $lista->ds_lista = 'Testado';
     
        $this->putJson(route('listas.update',$lista->id), $lista->toArray())
        ->assertStatus(Response::HTTP_OK);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
    }

         /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveDeletarUmaLista()
    {
        $lista = Lista::factory()->create();
     
        $this->deleteJson(route('listas.destroy',$lista->id))
        ->assertStatus(Response::HTTP_OK);
        
        $this->assertDatabaseMissing((new Lista())->getTable(), $lista->toArray());
    }

          /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveTestarSeUmaListaExisteParaSerDeletada()
    {
        $lista = Lista::factory()->create();
     
        $this->deleteJson(route('listas.destroy',132))
        ->assertStatus(Response::HTTP_FORBIDDEN);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
    }

            /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveBuscarListas()
    {
      
        $lista = Lista::factory()->create();
        $this->getJson(route('listas.index'))
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonFragment(['usuario_id' => $lista->usuario_id])
        ->assertJsonFragment(['ds_lista' => $lista->ds_lista])
        ->assertJsonFragment(['fl_realizado' => $lista->fl_realizado]);
        
    }
            /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveBuscarUmaListaPorId()
    {
      
        $lista = Lista::factory()->create();
        $this->getJson(route('listas.show',$lista->id))
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonFragment(['usuario_id' => $lista->usuario_id])
        ->assertJsonFragment(['ds_lista' => $lista->ds_lista])
        ->assertJsonFragment(['fl_realizado' => $lista->fl_realizado]);
        
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveTestarSeUmaListaExisteParaSerExibida()
    {
        $lista = Lista::factory()->create();
     
        $this->getJson(route('listas.show',132))
        ->assertStatus(Response::HTTP_FORBIDDEN);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
    }

          /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveTestarSeUmaListaExisteParaSerAlterada()
    {
        $lista = Lista::factory()->create();
     
        $this->putJson(route('listas.update',132))
        ->assertStatus(Response::HTTP_FORBIDDEN);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
    }

              /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveTestarSeUmaListaExisteParaSerChecada()
    {
        $lista = Lista::factory()->create();
     
        $this->putJson(route('listas.done',132))
        ->assertStatus(Response::HTTP_FORBIDDEN);
        
        $this->assertDatabaseHas((new Lista())->getTable(), $lista->toArray());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function esteMetodoDeveTestarCamposObrigatorios()
    {
        $lista = Lista::factory()->create();
     
        $this->postJson(route('listas.store'),[])
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrors(['ds_lista'])
        ->assertJsonFragment(
            [
                __('validation.required', ['attribute' => 'ds lista']),
            ]
        );

        $this->postJson(route('listas.store'),[])
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrors(['usuario_id'])
        ->assertJsonFragment(
            [
                __('validation.required', ['attribute' => 'usuario id']),
            ]
        );

        $this->postJson(route('listas.store'),[])
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrors(['fl_realizado'])
        ->assertJsonFragment(
            [
                __('validation.required', ['attribute' => 'fl realizado']),
            ]
        );
    }
}
