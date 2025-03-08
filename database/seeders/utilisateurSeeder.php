<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        utilisateur::factory()->count(10)->create();
    }
}