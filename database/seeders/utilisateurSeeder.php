<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
        // User::create([
        //     'name' =>'nour',
        //      'email' =>'nour@gmail.com',
        //     'email_verified_at' => now(),
        //    'password' =>bcrypt(2005),
        //    'role_id' => 1,
        //     'remember_token' =>123
        // ]);
    }
}