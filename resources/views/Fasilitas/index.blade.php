<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
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
                        <x-primary-button class="justify-center w-full sm:w-auto " onclick="window.location='{{ route('fasilitas.create') }}'">Tambah Fasilitas</x-primary-button>
                        
                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5 bg-red-600" onclick="window.location='{{ route('fasilitas.exportPdf', ['bulan' => $bulan ?? now()->month, 'tahun' => $tahun ?? now()->year]) }}'">Export PDF</x-primary-button>

 
                        <label for="bulan" class="ml-[330px]" ></label>
                        <select id="bulan" name="bulan" required>
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                            @endfor
                        </select>

                        <label for="tahun" class="ml-[30px]"></label>
                        <input type="number" id="tahun" name="tahun" value="{{ now()->year }}" required>
                        

                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5">Cari</x-primary-button>
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
                        @foreach ($fasilitas as $index => $fasilitas)
                            <tr>
                                <td class=" text-center">{{ $index + 1 }}</td>
                                <td class=" text-center">{{ $fasilitas->nama_fasilitas }}</td>
                                <td class=" text-center">{{ $fasilitas->kategori->nama_kategori }}</td>
                                <td class=" text-center">{{ $fasilitas->updated_at }}</td>
                                <td class=" text-center">{{ $fasilitas->penggunaan }}</td>
                                <td class=" text-center">{{ $fasilitas->stok }}</td>

                                <td class=" text-center">
                                    <x-secondary-button 
                                        tag="button"
                                        onclick="window.location='{{ route('fasilitas.edit', $fasilitas->id) }}'">Edit
                                    </x-secondary-button>
                                    <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-fasilitas-deletion-{{ $fasilitas->id }}')"
                                        x-on:click="$dispatch('set-action', '{{ route('fasilitas.destroy', $fasilitas->id) }}')"
                                        >{{ __('Delete') }}
                                    </x-danger-button>
                                </td>
                            </tr>
                               
                            <!-- Modal Konfirmasi Penghapusan -->
                            <x-modal name="confirm-fasilitas-deletion-{{ $fasilitas->id }}" focusable maxWidth="xl">
                            <form method="POST" action="{{ route('fasilitas.destroy', $fasilitas->id) }}" class="p-6">
                                @csrf
                                @method('DELETE')
                                <h2 class="m-3 text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Apakah anda yakin akan menghapus data?') }}
                                </h2>
                                <p class="m-3 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Setelah proses dilaksanakan, data akan dihilangkan secara permanen.') }}
                                </p>
                                <div class="m-6 flex justify-end">
                                    <!-- Tombol Cancel -->
                                    <x-secondary-button type="button" x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <!-- Tombol Delete -->
                                    <x-danger-button type="submit" class="ml-8">
                                        {{ __('Delete!!!') }}
                                    </x-danger-button>
                                </div>
                            </form>

                                </x-modal>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
