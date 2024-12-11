<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if(!User::where('email', 'maria@gmail.com.br')->first()){
            User::create([
                'name' => 'Maria',
                'email' => 'maria@gmail.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'kelly@gmail.com.br')->first()){
            User::create([
                'name' => 'Kelly',
                'email' => 'kelly@gmail.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'jessica@gmail.com.br')->first()){
            User::create([
                'name' => 'Jessica',
                'email' => 'jessica@gmail.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'gabriellygmail.com.br')->first()){
            User::create([
                'name' => 'Gabrielly',
                'email' => 'gabrielly@gmail.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
    }
}