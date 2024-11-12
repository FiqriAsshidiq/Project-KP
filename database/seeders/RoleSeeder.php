<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                
                'posisi' => 'Manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'posisi' => 'Kepala Hoskeeping',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'posisi' => 'Karyawan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
