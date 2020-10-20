<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pieter',
            'email' => 'pieter@pieter.com',
            'password' => Hash::make("12345"),
            'admin' => true
        ]);
    }
}
