<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Tambah Fasilitas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('fasilitas.store') }}" class="mt-6 space-y-6">
                        @csrf
                        
                        <!-- Nama Fasilitas -->
                        <div class="max-w-xl">
                            <x-input-label for="nama_fasilitas" value="Nama Fasilitas" />
                            <x-text-input id="nama_fasilitas" type="text" name="nama_fasilitas" class="mt-1 block w-full" value="{{ old('nama_fasilitas') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_fasilitas')" />
                        </div>

                        <!-- Kategori -->
                        <div class="max-w-xl">
                            <x-input-label for="kategori_id" value="Kategori" />
                            <x-select-input id="kategori_id" name="kategori_id" class="mt-1 block w-full" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_id')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button tag="a" href="{{ route('fasilitas') }}">Cancel</x-secondary-button>
                            <x-primary-button class="ml-3">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
