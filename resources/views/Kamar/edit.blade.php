<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Kamar') }}
        </h2>
    </x-slot>

    <div class="py-5 px-2">
                <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div >
                    <h1>
                        Form Edit Kamar                    
                    </h1>
                    <hr>
                    <br>

                    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Tipe Kamar -->

                        <!-- Status Fasilitas -->
                        <div class="mb-4">
                            <label for="status_fasilitas" class="block text-sm font-medium text-gray-700">Status Fasilitas</label>
                            <select id="status_fasilitas" name="status_fasilitas" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="lengkap" {{ old('status_fasilitas', $kamar->status_fasilitas) == 'lengkap' ? 'selected' : '' }}>Lengkap</option>
                                <option value="tidak lengkap" {{ old('status_fasilitas', $kamar->status_fasilitas) == 'tidak lengkap' ? 'selected' : '' }}>Tidak Lengkap</option>
                            </select>
                        </div>

                        <!-- Kondisi Kamar -->
                        <div class="mb-4">
                            <label for="kondisi_kamar" class="block text-sm font-medium text-gray-700">Kondisi Kamar</label>
                            <select id="kondisi_kamar" name="kondisi_kamar" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="bersih" {{ old('kondisi_kamar', $kamar->kondisi_kamar) == 'bersih' ? 'selected' : '' }}>Bersih</option>
                                <option value="belum bersih" {{ old('kondisi_kamar', $kamar->kondisi_kamar) == 'belum bersih' ? 'selected' : '' }}>Belum Bersih</option>
                            </select>
                        </div>

                        <!-- Status Kamar -->
                        <div class="mb-4">
                            <label for="status_kamar" class="block text-sm font-medium text-gray-700">Status Kamar</label>
                            <select id="status_kamar" name="status_kamar" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="terisi" {{ old('status_kamar', $kamar->status_kamar) == 'terisi' ? 'selected' : '' }}>Terisi</option>
                                <option value="kosong" {{ old('status_kamar', $kamar->status_kamar) == 'kosong' ? 'selected' : '' }}>Kosong</option>
                            </select>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">
                            <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                            <input type="text" id="catatan" name="catatan" value="{{ old('catatan', $kamar->catatan) }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Catatan tambahan (opsional)">
                                   <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end">
                        <div class="flex items-center justify-end">
                            <x-primary-button tag="a" href="{{ route('kamar') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                            <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
