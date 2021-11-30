<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker;
use App\Models\User;

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
            'name' => 'Satrio Akbar Sudigdo',
            'email' => 'satrioakbar12@student.uns.ac.id',
            'password' => Hash::make('password123')
        ]);
    }
}
