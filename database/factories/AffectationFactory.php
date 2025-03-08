<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AffectationFactory extends Factory
{
    public function definition()
    {
        return [
            'utilisateur_id' => \App\Models\Utilisateur::factory(),
            'courrier_id' => \App\Models\Courrier::factory(),
            'reponse' => $this->faker->boolean,
            'duree_reponse' => $this->faker->numberBetween(1, 30),
        ];
    }
}