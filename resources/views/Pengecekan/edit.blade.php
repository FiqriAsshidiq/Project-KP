<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pengecekan Fasilitas') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('pengecekan.update', $pengecekan->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="max-w-xl">
                            <x-input-label for="fasilitas_code" value="Kode Fasilitas" />
                            <x-text-input id="fasilitas_code" type="text" name="fasilitas_code" class="mt-1 block w-full" value="{{ $pengecekan->fasilitas_code }}" disabled />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="jumlah" value="Jumlah" />
                            <x-text-input id="jumlah" type="number" name="jumlah" class="mt-1 block w-full" value="{{ old('jumlah', $pengecekan->jumlah) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button tag="a" href="{{ route('pengecekan') }}">Batal</x-secondary-button>
                            <x-primary-button class="ml-3">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
