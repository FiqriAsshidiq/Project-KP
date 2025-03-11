<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Fasilitas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div > 
                    <h1>
                        Form Edit Fasilitas
                    </h1>
                    <hr>
                    <br>                   
                    <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Fasilitas -->
                        <div class="mb-4">
                            <label for="nama_fasilitas" class="block text-sm font-medium text-gray-700">Nama Fasilitas</label>
                            <input type="text" id="nama_fasilitas" name="nama_fasilitas" 
                                   value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                   <x-input-error class="mt-2" :messages="$errors->get('nama_fasilitas')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end">
                        <x-primary-button tag="a" href="{{ route('fasilitas') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                         <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
