<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
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

                    <div class="mb-4 px-8">
                    <form method="GET" action="{{ route('transaksi.search') }}">
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('transaksi.create') }}'">Tambah Transaksi</x-primary-button>
                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5" onclick="window.location='{{ route('transaksi.exportPdf', ['bulan' => $bulan ?? now()->month, 'tahun' => $tahun ?? now()->year]) }}'">Export PDF</x-primary-button>
 
                        <label for="bulan" class="ml-[330px]" ></label>
                        <select id="bulan" name="bulan" required>
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                            @endfor
                        </select>

                        <label for="tahun" class="ml-[30px]" >Tahun</label>
                        <input type="number" id="tahun" name="tahun" value="{{ now()->year }}" required>
                        

                        <x-primary-button class="justify-center w-full sm:w-auto my-2.5">Cari</x-primary-button>
                        <br>
                    </form>
                    </div>
                    
                    <br>
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class=" text-center">No</th>
                            <th class=" text-center">Tanggal</th>
                            <th class=" text-center">Nama Fasilitas</th>
                            <th class=" text-center">Barang Masuk</th>
                            <th class=" text-center">Barang Keluar</th>
                            <th class=" text-center">Aksi</th>
                        </tr>
                    </x-slot>
                    @php $num = 1; @endphp
                    @foreach ($transaksi as $index => $transaksi)
                        <tr>
                            <td class=" text-center">{{ $index + 1 }}</td>
                            <td class=" text-center">{{ $transaksi->tanggal }}</td>
                            <td class=" text-center">{{ $transaksi->fasilitas->nama_fasilitas }}</td> 
                            <td class=" text-center">{{ $transaksi->barang_masuk }}</td>
                            <td class=" text-center">{{ $transaksi->penggunaan_barang }}</td> <!-- Akses penggunaan barang dari transaksi -->
                            <td class=" text-center">
                                    <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-transaksi-deletion-{{ $transaksi->id }}')"
                                        x-on:click="$dispatch('set-action', '{{ route('transaksi.destroy', $transaksi->id) }}')"
                                        >{{ __('Delete') }}</x-danger-button>

                                </td>
                                </tr>

                                <!-- Modal Konfirmasi Penghapusan -->
                                <x-modal name="confirm-transaksi-deletion-{{ $transaksi->id }}" focusable maxWidth="xl">
                                <form method="POST" action="{{ route('transaksi.destroy', $transaksi->id) }}" class="p-6">
                                  @csrf
                                  @method('DELETE')
                                   <h2 class=" m-3 text-lg font-medium text-gray-900 dark:text-gray-100">
                                     {{ __('Apakah anda yakin akan menghapus data?') }}
                                        </h2>
                                        <p class="m-3 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Setelah proses dilaksanakan, data akan dihilangkan secara permanen.') }}
                                        </p>
                                        <div class="m-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                                        <x-danger-button class="ml-8">
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
