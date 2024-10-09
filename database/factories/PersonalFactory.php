<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ci' => $this->faker->unique()->numerify('########'),
            'nombre'=> $this->faker->firstName,
            'paterno' => $this->faker->lastName,
            'correo'=> fake()->unique()->safeEmail(),
            'celular'=> $this->faker->phoneNumber,
            'fechaini'=>$this->faker->date,
            'fechafin'=>$this->faker->date,
            'gestion'=>$this->faker->year,
            'turno '=> $this->faker->randomElement(['MAÑANA', 'TARDE', 'TIEMPO COMPLETO']),
            'carrera'=> $this->faker->randomElement(['INFORMATICA', 'COMUNICACION', 'TELECOMUNICACIONES']),
            'area'=> $this->faker->randomElement(['PRENSA', 'ESTUDIO', 'PRODUCCION']),
            'relacion_laboral'=> $this->faker->randomElement(['PASANTE', 'CONTRATO', 'TRABAJO DIRIGIDO']),
        ];
    }
}
