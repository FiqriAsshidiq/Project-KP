<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [

            // fasilitas kamar mandi
            [
                'nama_fasilitas' => 'Bethub',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Sabun',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Handuk',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'closet',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Sower',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Gayung',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Ember',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Wastafel',
                'kategori_id' => '1',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


            // fasilitas di kamar tidur
            [
                'nama_fasilitas' => 'Kasur',
                'kategori_id' => '2',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Bantal',
                'kategori_id' => '2',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Guling',
                'kategori_id' => '2',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Selimut',
                'kategori_id' => '2',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Seprai',
                'kategori_id' => '2',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // acsesoris
            [
                'nama_fasilitas' => 'Asbak',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Televisi',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Lemari',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Pintu',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Jendela',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_fasilitas' => 'Sendal Hotel',
                'kategori_id' => '3',
                'stok' => '0',
                'penggunaan' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        DB::table('fasilitas')->insert($fasilitas);
    }
}
