<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
    {{ __('Pengecekan Fasilitas') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="mb-4 px-8">
                    <form method="GET" action="{{ route('pengecekan.search') }}">
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('pengecekan.create') }}'">Tambah Data</x-primary-button>
                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5 mr-[230px] bg-red-600" onclick="window.location='{{ route('pengecekan.exportPdf', ['bulan' => $bulan ?? now()->month, 'tahun' => $tahun ?? now()->year]) }}'">Export PDF</x-primary-button>
 
                        <label for="bulan" class="mr-[150px]" ></label>
                        <select id="bulan" name="bulan" required>
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                            @endfor
                        </select>

                        <label for="tahun" ></label>
                        <input type="number" id="tahun" name="tahun" value="{{ now()->year }}" required>
                        

                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5">Cari</x-primary-button>
                        <br>
                    </form>
                    </div>

                        <!-- Tambah Pengecekan Button -->
                    </div>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class=" text-center">No</th>
                                <th class=" text-center">Tanggal</th>
                                <th class=" text-center">Nama Fasilitas</th>
                                <th class=" text-center">Jumlah Rusak</th>
                            </tr>
                        </x-slot>
                        @foreach ($pengecekan_fasilitas as $index => $pengecekan_fasilitas)
                            <tr>
                                <td class=" text-center">{{ $index + 1 }}</td>
                                <td class=" text-center">{{ $pengecekan_fasilitas->created_at }}</td>
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
