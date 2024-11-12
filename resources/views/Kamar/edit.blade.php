<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('kamar.update', $kamar->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="max-w-xl">
                            <x-input-label for="status_fasilitas" value="Status Fasilitas" />
                            <x-select-input id="status_fasilitas" name="status_fasilitas" class="mt-1 block w-full" required>
                                <option value="lengkap" {{ old('status_fasilitas', $kamar->status_fasilitas) == 'lengkap' ? 'selected' : '' }}>Lengkap</option>
                                <option value="tidak lengkap" {{ old('status_fasilitas', $kamar->status_fasilitas) == 'tidak lengkap' ? 'selected' : '' }}>Tidak Lengkap</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('status_fasilitas')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="status_kamar" value="Status Kamar" />
                            <x-select-input id="status_kamar" name="status_kamar" class="mt-1 block w-full" required>
                                <option value="terisi" {{ old('status_kamar', $kamar->status_kamar) == 'terisi' ? 'selected' : '' }}>Terisi</option>
                                <option value="kosong" {{ old('status_kamar', $kamar->status_kamar) == 'kosong' ? 'selected' : '' }}>Kosong</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('status_kamar')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="catatan" value="Catatan" />
                            <x-text-input id="catatan" type="text" name="catatan" class="mt-1 block w-full" value="{{ old('catatan', $kamar->catatan) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                        </div>

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
