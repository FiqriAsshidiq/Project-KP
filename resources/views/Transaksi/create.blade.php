<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Pesan Error -->
                    @if (session('error'))
                        <div class="alert alert-danger mb-4 p-4 rounded-lg bg-red-100 text-red-800">
                            {{ session('error') }}
                        </div>
                        <script>
                            // Menghapus notifikasi setelah 4 detik
                            setTimeout(function() {
                                var notification = document.getElementById('success-notification');
                                if (notification) {
                                    notification.style.display = 'none';
                                }
                            }, 4000); // 4000 ms = 4 detik
                        </script>
                    @endif

                    <form method="post" action="{{ route('transaksi.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="fasilitas_id" value="fasilitas" />
                            <x-select-input id="fasilitas_id" name="fasilitas_id" class="mt-1 block w-full" required>
                                <option value="">Pilih fasilitas</option>
                                @foreach($fasilitas as $fasilitas)
                                    <option value="{{ $fasilitas->id }}" {{ old('fasilitas_id') == $fasilitas->id ? 'selected' : '' }}>{{ $fasilitas->nama_fasilitas }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('fasilitas_id')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="barang_masuk" value="jumlah barang masuk" />
                            <x-text-input id="barang_masuk" type="number" name="barang_masuk" class="mt-1 block w-full" value="{{ old('barang_masuk') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('barang_masuk')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="barang_keluar" value="jumlah penggunaan barang" />
                            <x-text-input id="barang_keluar" type="number" name="barang_keluar" class="mt-1 block w-full" value="{{ old('barang_keluar') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('barang_keluar')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button tag="a" href="{{ route('transaksi') }}">Cancel</x-secondary-button>
                            <x-primary-button class="ml-3">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
