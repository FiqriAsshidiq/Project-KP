<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengecekan Fasilitas') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Content here -->
                    <div class="flex items-center justify-between mb-4">
                        <!-- Form Pencarian -->
                        <!-- Tambah Pengecekan Button -->
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('pengecekan.create') }}'">Tambah Pengecekan</x-primary-button>
                    </div>
                    <br><br>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class=" text-center">No</th>
                                <th class=" text-center">Nama Fasilitas</th>
                                <th class=" text-center">Jumlah Rusak</th>
                            </tr>
                        </x-slot>
                        @foreach ($pengecekan_fasilitas as $index => $pengecekan_fasilitas)
                            <tr>
                                <td class=" text-center">{{ $index + 1 }}</td>
                                <td class=" text-center">{{ $pengecekan_fasilitas->fasilitas->nama_fasilitas }}</td>
                                <td class=" text-center">{{ $pengecekan_fasilitas->jumlah_rusak}}</td>
                            </tr>
                        @endforeach
                    </x-table>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
