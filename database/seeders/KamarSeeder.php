<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data 1-50: single room, lengkap, bersih, kosong
        $singleRoomData = [];
        for ($i = 0; $i < 50; $i++) {
            $singleRoomData[] = [
                'tipe_kamar' => 'single room',
                'status_fasilitas' => 'lengkap',
                'kondisi_kamar' => 'bersih',
                'status_kamar' => 'kosong',
                'catatan' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Data 51-100: double room, tidak lengkap, belum bersih, terisi
        $doubleRoomData = [];
        for ($i = 0; $i < 50; $i++) {
            $doubleRoomData[] = [
                'tipe_kamar' => 'double room',
                'status_fasilitas' => 'tidak lengkap',
                'kondisi_kamar' => 'belum bersih',
                'status_kamar' => 'terisi',
                'catatan' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert data ke tabel kamars
        DB::table('kamars')->insert($singleRoomData);
        DB::table('kamars')->insert($doubleRoomData);
    }
}
