<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fasilitas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Notifikasi -->
                    @if (session('success'))
                        <div id="success-notification" class="bg-green-500 text-white p-4 rounded">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Menghapus notifikasi setelah 4 detik
                            setTimeout(function() {
                                var notification = document.getElementById('success-notification');
                                if (notification) {
                                    notification.style.display = 'none';
                                }
                            }, 4000); // 4000 ms = 4 detik
                        </script>
                    @endif

                    <br>

                    <!-- Tombol Tambah dan Print Fasilitas -->
                    <div class="mb-4 px-8">
                    <form method="GET" action="{{ route('fasilitas.search') }}">
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('fasilitas.create') }}'">Tambah Fasilitas</x-primary-button>
                        
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('fasilitas.exportPdf', ['bulan' => $bulan, 'tahun' => $tahun]) }}'">
    Export PDF
</x-primary-button>
 
                        <label for="bulan">Bulan</label>
                        <select id="bulan" name="bulan" required>
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                            @endfor
                        </select>

                        <label for="tahun">Tahun</label>
                        <input type="number" id="tahun" name="tahun" value="{{ now()->year }}" required>

                        <x-primary-button class="justify-center w-full sm:w-auto">Cari</x-primary-button>
                        <br>
                    </form>
                    </div>

                    <!-- Tabel Fasilitas -->
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class=" text-center">No</th>
                                <th class=" text-center">Nama Fasilitas</th>
                                <th class=" text-center">Kategori</th>
                                <th class=" text-center">Tanggal Update</th>
                                <th class=" text-center">penggunaan</th>
                                <th class=" text-center">Stok</th>
                                <th class=" text-center">Aksi</th>
                            </tr>
                        </x-slot>
                        @foreach ($fasilitas as $index => $fas)
                            <tr>
                                <td class=" text-center">{{ $index + 1 }}</td>
                                <td class=" text-center">{{ $fas->nama_fasilitas }}</td>
                                <td class=" text-center">{{ $fas->kategori->nama_kategori }}</td>
                                <td class=" text-center">{{ $fas->updated_at }}</td>
                                <td class=" text-center">{{ $fas->penggunaan }}</td>
                                <td class=" text-center">{{ $fas->stok }}</td>

                                <td class=" text-center">
                                    <x-secondary-button 
                                        tag="button"
                                        onclick="window.location='{{ route('fasilitas.edit', $fas->id) }}'">Edit</x-secondary-button>
                                        <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-fasilitas-deletion-{{ $fas->id }}')"
                                        x-on:click="$dispatch('set-action', '{{ route('fasilitas.destroy', $fas->id) }}')"
                                        >{{ __('Delete') }}</x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
