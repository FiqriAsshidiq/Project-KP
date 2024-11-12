<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>
    <!-- Kontainer utama dengan Flexbox untuk memisahkan empat baris -->
    <div class="container mx-auto">
        <!-- Baris 1: Kamar -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <!-- Kolom 1: Jumlah Kamar -->
            <div class="card bg-yellow-500">
                <h5 class="card-title">TotalKamar</h5>
                <div class="count">{{ $totalKamar }}</div>           
             </div>
            <!-- Kolom 2: Terisi -->
            <div class="card bg-yellow-500">
                <h5 class="card-title">Kamar Terisi</h5>
                <div class="count">{{ $totalKamarTerisi }}</div>                
            </div>
            <!-- Kolom 3: Belum Dibersihkan -->
            <div class="card bg-yellow-500">
                <h5 class="card-title">Jumlah Kamar Belum Dibersihkan</h5>
                <div class="count">{{ $totaBelumbersih }}</div>

            </div>
        </div>

        <!-- Baris 2: Fasilitas -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <!-- Kolom 1: Fasilitas Rusak -->
            <div class="card bg-purple-500">
                <h5 class="card-title">Total Barang</h5>
                <div class="count">{{ $totalFasilitas }}</div> 
            </div>
            <!-- Kolom 2: Fasilitas Digunakan -->
            <div class="card bg-purple-500">
                <h5 class="card-title">Total Barang Digunakan</h5>
                <div class="count">{{ $totalPenggunaan }}</div> 

            </div>
            <!-- Kolom 3: Fasilitas Stok -->
            <div class="card bg-purple-500">
                <h5 class="card-title">Total Stok Fasilitas</h5>
                <div class="count">{{ $totalStok }}</div> 
            </div>
        </div>

        <!-- Baris 3: Transaksi -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <!-- Kolom 1: Total Transaksi -->
            <div class="card bg-teal-500">
                <h5 class="card-title">Total Transaksi</h5>
                <div class="count">{{ $totalTransaksi }}</div> 
            </div>
            <!-- Kolom 2: Transaksi Berhasil -->
            <div class="card bg-teal-500">
                <h5 class="card-title">Transaksi Barang Masuk</h5>
                <div class="count">{{ $totalBarangMasuk }}</div> 
            </div>
            <!-- Kolom 3: Transaksi Gagal -->
            <div class="card bg-teal-500">
                <h5 class="card-title">Transaksi Barang Keluar</h5>
                <div class="count">{{ $totalBarangKeluar }}</div> 
            </div>
        </div>

        <!-- Baris 4: Pengguna dan Pengecekan -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Kolom 1: Total Pengguna -->
            <div class="card bg-lime-500">
                <h5 class="card-title">Total User</h5>
                <div class="count">{{ $totalUsers }} </div>
            </div>
            <!-- Kolom 2: Pengguna Baru -->
            <div class="card bg-red-500">
                <h5 class="card-title">Jumlah Fasilitas Rusak</h5>
                <div class="count">{{ $totalBarangRusak }} </div>
            </div>
            
        </div>
    </div>

    <style>
        .container {
            padding: 20px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .count {
            font-size: 24px;
            font-weight: bold;
        }

        /* Grid styling */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 kolom */
            gap: 20px;
        }

        /* Responsiveness: 1 kolom pada layar kecil (mobile) */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr; /* Berubah jadi 1 kolom */
            }
        }
    </style>
</x-app-layout>
