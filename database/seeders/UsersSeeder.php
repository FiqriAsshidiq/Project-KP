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
                'Telphone' => '+62 81',
                'password' => Hash::make('password'), 
                'role_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kepala Hoseeping',
                'email' => 'Kepala@gmail.com',
                'Telphone' => '+62 82',
                'password' => Hash::make('password'), 
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karyawan',
                'email' => 'Karyawan@gmail.com',
                'Telphone' => '+62 83',
                'password' => Hash::make('password'), 
                'role_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Resepsionis',
                'email' => 'FO@gmail.com',
                'Telphone' => '+62 8322',
                'password' => Hash::make('password'), 
                'role_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
