<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KamarSeeder::class,
            KategoriSeeder::class,
            FasilitasSeeder::class,
            RoleSeeder::class,
            UsersSeeder::class,
        ]);    
    }
}
