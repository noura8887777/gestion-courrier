<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourrierFactory extends Factory
{
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'num_order_annuel' => $this->faker->unique()->numberBetween(1000, 9999),
           'date_lettre' => $this->faker->date,
           'num_lettre' => $this->faker->unique()->numberBetween(100, 999),
           'designation_destinataire' => $this->faker->name,
           'analyse_affaire' => $this->faker->paragraph,
           'date_reponse' => $this->faker->optional()->date,
           'num_reponse' => $this->faker->optional()->numberBetween(100, 999),
           'utilisateur_id' => \App\Models\utilisateur::factory(),
           'statut_id' => \App\Models\statut::factory(),
           'fichier_id' => \App\Models\fichier::factory(),
           'type_courrier_id'=>\App\Models\TypeCourrier::factory()
        ];
    }
}