<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Tambah Fasilitas') }}
        </h2>
    </x-slot>

    <div class="py-5 px-2">>
        <div class=" bg-white mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div >
                    <h1>
                        Form Tambah Fasilitas
                    </h1>
                    <hr>
                    <br>
                    <form action="{{ route('fasilitas.store') }}" method="POST">
                        @csrf

                        <!-- Nama Fasilitas -->
                        <div class="mb-4">
                            <label for="nama_fasilitas" class="block text-sm font-medium text-gray-700">Nama Fasilitas</label>
                            <input type="text" id="nama_fasilitas" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                   <x-input-error class="mt-2" :messages="$errors->get('nama_fasilitas')" />
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="kategori_id" name="kategori_id" 
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end">
                        <x-primary-button tag="a" href="{{ route('fasilitas') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                            <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                        </div>
                    </form>
                    <br><br><br><br><br>                    <br><br><br><br><br>                    <br><br><br><br><br>                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
