<?php

namespace Database\Factories;

use App\Models\Lista;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return ['usuario_id' => Usuario::factory(),
        'ds_lista' => $this->faker->paragraph(1),
        'fl_realizado' => false];
    }
}
