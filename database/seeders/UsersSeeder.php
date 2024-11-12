<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Manager',
                'email' => 'Manager@gmail.com',
                'password' => Hash::make('password'), // pastikan untuk mengganti dengan password yang aman
                'role_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kepala Hoseeping',
                'email' => 'Kepala Hoskeeping@gmail.com',
                'password' => Hash::make('password'), // pastikan untuk mengganti dengan password yang aman
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karyawan',
                'email' => 'Karyawan@gmail.com',
                'password' => Hash::make('password'), // pastikan untuk mengganti dengan password yang aman
                'role_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
