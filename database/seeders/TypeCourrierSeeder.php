<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeCourrier;

class TypeCourrierSeeder extends Seeder
{
    public function run()
    {
        TypeCourrier::factory()->count(5)->create();
    }
}
