<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Fasilitas') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('fasilitas.update', $fasilitas->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="max-w-xl">
                            <x-input-label for="nama_fasilitas" value="Nama Fasilitas" />
                            <x-text-input id="nama_fasilitas" type="text" name="nama_fasilitas" class="mt-1 block w-full" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_fasilitas')" />
                        </div>

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
