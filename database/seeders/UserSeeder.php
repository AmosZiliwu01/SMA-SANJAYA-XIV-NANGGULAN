<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'administrator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Author',
                'username' => 'author',
                'email' => 'author@example.com',
                'password' => Hash::make('password'),
                'role' => 'author',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
