<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Tambah Pengecekan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('pengecekan.store') }}" class="mt-6 space-y-6">
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
                            <x-input-label for="jumlah_rusak" value="jumlah barang rusak" />
                            <x-text-input id="jumlah_rusak" type="number" name="jumlah_rusak" class="mt-1 block w-full" value="{{ old('jumlah_rusak') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_rusak')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button tag="a" href="{{ route('pengecekan') }}">Cancel</x-secondary-button>
                            <x-primary-button class="ml-3">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
