<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form method="GET" action="{{ route('other.search') }}" class="mb-4">
    <div class="flex items-center">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Cari kondisi kamar..." 
            class="border border-gray-300 rounded p-2 w-1/3"
        >
        <x-primary-button class="ml-4">{{ __('Cari') }}</x-primary-button>
    </div>
</form>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="text-left">ID</th>
            <th class="text-left">Tipe Kamar</th>
            <th class="text-left">Status Kamar</th>
            <th class="text-left">Kondisi Kamar</th>
            <th class="text-left">Status Fasilitas</th>
            <th class="text-left">Catatan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kamars as $kamar)
            <tr>
                <td>{{ $kamar->id }}</td>
                <td>{{ $kamar->tipe_kamar }}</td>
                <td>{{ $kamar->status_kamar }}</td>
                <td>{{ $kamar->kondisi_kamar }}</td>
                <td>{{ $kamar->status_fasilitas }}</td>
                <td>{{ $kamar->catatan }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Tidak ada data ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
