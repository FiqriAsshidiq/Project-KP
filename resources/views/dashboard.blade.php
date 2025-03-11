<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight" style="font-size: 40px;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>
    <div class="container mx-auto p-6">
        <!-- Baris 1: Kamar -->
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total Kamar</h5>
                <div class="text-2xl font-bold">{{ $totalKamar }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Kamar Terisi</h5>
                <div class="text-2xl font-bold">{{ $totalKamarTerisi }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Jumlah Kamar Belum Dibersihkan</h5>
                <div class="text-2xl font-bold">{{ $totaBelumbersih }}</div>
            </div>
        </div>

        <!-- Baris 2: Fasilitas -->
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total Barang</h5>
                <div class="text-2xl font-bold">{{ $totalFasilitas }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total Barang Digunakan</h5>
                <div class="text-2xl font-bold">{{ $totalPenggunaan }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total Stok Fasilitas</h5>
                <div class="text-2xl font-bold">{{ $totalStok }}</div>
            </div>
        </div>

        <!-- Baris 3: Transaksi -->
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total Transaksi</h5>
                <div class="text-2xl font-bold">{{ $totalTransaksi }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Transaksi Barang Masuk</h5>
                <div class="text-2xl font-bold">{{ $totalBarangMasuk }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Transaksi Barang Keluar</h5>
                <div class="text-2xl font-bold">{{ $totalBarangKeluar }}</div>
            </div>
        </div>

        <!-- Baris 4: Pengguna dan Pengecekan -->
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Total User</h5>
                <div class="text-2xl font-bold">{{ $totalUsers }}</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg border border-black text-black text-center">
                <h5 class="text-lg font-semibold">Jumlah Fasilitas Rusak</h5>
                <div class="text-2xl font-bold">{{ $totalBarangRusak }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
