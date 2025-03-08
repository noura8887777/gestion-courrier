<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Affectation;

class AffectationSeeder extends Seeder
{
    public function run()
    {
     
        affectation::factory()->count(20)->create();
    }
}
