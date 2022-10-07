<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user  = User::create([
            'name'      => "User Teste",
            'email'     => "user@bdz.com",
            'password'  => bcrypt("1234"),
        ]);
    }
}
