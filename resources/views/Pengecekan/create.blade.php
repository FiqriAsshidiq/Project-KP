<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Pengecekan') }}
        </h2>
    </x-slot>

    <div class="py-5 px-2">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div >
                    <h1>
                        Form Tambah Pengecekan Fasilitas
                    </h1>
                    <hr>
                    <br>
                    <form method="POST" action="{{ route('pengecekan.store') }}" class="mt-6 space-y-6">
                        @csrf

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

                        <!-- Jumlah Barang Rusak -->
                        <div class="mb-4">
                            <label for="jumlah_rusak" class="block text-sm font-medium text-gray-700">Jumlah Barang Rusak</label>
                            <input type="number" id="jumlah_rusak" name="jumlah_rusak" value="{{ old('jumlah_rusak') }}"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_rusak')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                        <x-primary-button tag="a" href="{{ route('pengecekan') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                            <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                        </div>
                    </form>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
