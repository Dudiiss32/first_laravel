<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Insiro direto no banco sem usar a model, quando eu quero usar algum campo q n está no fillable
    
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'adm@adm.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
        ]);

        User::factory(10)->create();
    }
}
