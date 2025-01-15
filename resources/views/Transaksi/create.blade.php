<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transaksi.store') }}" class="mt-6 space-y-6">
                        @csrf

                        @if (session('eror'))
                        <div id="eror-notification" class="bg-red-500 text-white p-4 rounded">
                            {{ session('eror') }}
                        </div>
                        <script>
                            // Menghapus notifikasi setelah 4 detik
                            setTimeout(function() {
                                var notification = document.getElementById('eror-notification');
                                if (notification) {
                                    notification.style.display = 'none';
                                }
                            }, 4000); // 4000 ms = 4 detik
                        </script>
                    @endif

                        <!-- Fasilitas -->
                        <div class="mb-4">
                            <label for="fasilitas_id" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                            <select id="fasilitas_id" name="fasilitas_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Pilih Fasilitas</option>
                                @foreach($fasilitas as $fasilitas)
                                    <option value="{{ $fasilitas->id }}" {{ old('fasilitas_id') == $fasilitas->id ? 'selected' : '' }}>{{ $fasilitas->nama_fasilitas }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('fasilitas_id')" />
                        </div>

                        <!-- Jumlah Barang Masuk -->
                        <div class="mb-4">
                            <label for="barang_masuk" class="block text-sm font-medium text-gray-700">Jumlah Barang Masuk</label>
                            <input type="number" id="barang_masuk" name="barang_masuk" value="{{ old('barang_masuk') }}"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <x-input-error class="mt-2" :messages="$errors->get('barang_masuk')" />
                        </div>

                        <!-- Jumlah Penggunaan Barang -->
                        <div class="mb-4">
                            <label for="barang_keluar" class="block text-sm font-medium text-gray-700">Jumlah Barang Keluar</label>
                            <input type="number" id="barang_keluar" name="barang_keluar" value="{{ old('barang_keluar') }}"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <x-input-error class="mt-2" :messages="$errors->get('barang_keluar')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                        <x-primary-button tag="a" href="{{ route('transaksi') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                        <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
