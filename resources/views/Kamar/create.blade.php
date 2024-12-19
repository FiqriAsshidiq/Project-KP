<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('kamar.store') }}" class="space-y-6">
                        @csrf

                        <!-- Tipe Kamar -->
                        <div class="max-w-xl">
                            <x-input-label for="tipe_kamar" value="Tipe Kamar" />
                            <x-select-input id="tipe_kamar" name="tipe_kamar" class="mt-1 block w-full" required>
                                <option value="">Pilih Tipe Kamar</option>
                                <option value="single room">Single Room</option>
                                <option value="double room">Double Room</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('tipe_kamar')" />
                        </div>

                        <!-- Status Fasilitas -->
                        <div class="max-w-xl">
                            <x-input-label for="status_fasilitas" value="Status Fasilitas" />
                            <x-select-input id="status_fasilitas" name="status_fasilitas" class="mt-1 block w-full" required>
                                <option value="">Pilih Status Fasilitas</option>
                                <option value="lengkap">Lengkap</option>
                                <option value="tidak lengkap">Tidak Lengkap</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('status_fasilitas')" />
                        </div>

                        <!-- Kondisi Kamar -->
                        <div class="max-w-xl">
                            <x-input-label for="kondisi_kamar" value="Kondisi Kamar" />
                            <x-select-input id="kondisi_kamar" name="kondisi_kamar" class="mt-1 block w-full" required>
                                <option value="">Pilih Kondisi Kamar</option>
                                <option value="bersih">Bersih</option>
                                <option value="belum bersih">Belum Bersih</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kondisi_kamar')" />
                        </div>

                        <!-- Status Kamar -->
                        <div class="max-w-xl">
                            <x-input-label for="status_kamar" value="Status Kamar" />
                            <x-select-input id="status_kamar" name="status_kamar" class="mt-1 block w-full" required>
                                <option value="">Pilih Status Kamar</option>
                                <option value="terisi">Terisi</option>
                                <option value="kosong">Kosong</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('status_kamar')" />
                        </div>

                        <!-- Catatan -->
                        <div class="max-w-xl">
                            <x-input-label for="catatan" value="Catatan" />
                            <x-text-input id="catatan" type="text" name="catatan" class="mt-1 block w-full" value="{{ old('catatan') }}" placeholder="Catatan tambahan (opsional)" />
                            <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button tag="a" href="{{ route('kamar') }}">Cancel</x-secondary-button>
                            <x-primary-button class="ml-3">Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
