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

                    <!-- tombol tambah -->
                    <div class="mb-4">
                        <x-primary-button class="justify-center w-full sm:w-auto" onclick="window.location='{{ route('kamar.create') }}'">Tambah Kamar</x-primary-button>
                    </div>

                    <x-table class="border-collapse border-5 border-black" cellspacing="0">
                        <x-slot name="header">
                            <tr>
                                <th class=" text-center">NO Kamar</th>
                                <th class=" text-center">Tipe Kamar</th>
                                <th class=" text-center">Status Kamar</th>
                                <th class=" text-center">Kondisi Kamar</th>
                                <th class=" text-center">Status Fasilitas</th>
                                <th class=" text-center">Catatan</th>
                                <th class=" text-center">Updated At</th>
                                <th class=" text-center">Aksi</th>
                            </tr>
                        </x-slot>
                        @foreach ($kamars as $index => $kamar)
                            <tr>
                                <td class=" text-center">{{ $index + 1 }}</td>
                                <td class=" text-center">{{ $kamar->tipe_kamar }}</td>
                                <td class=" text-center">{{ $kamar->status_kamar }}</td>
                                <td class=" text-center">{{ $kamar->kondisi_kamar }}</td>
                                <td class=" text-center">{{ $kamar->status_fasilitas }}</td>
                                <td class=" text-center">{{ $kamar->catatan }}</td>
                                <td class=" text-center">{{ $kamar->updated_at }}</td>
                                <td class=" text-center">
                                    <x-primary-button 
                                        x-data=""
                                        onclick="window.location='{{ route('kamar.edit', $kamar->id) }}'" class="bg-yellow-400">Edit
                                    </x-primary-button>
                                    <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-kamar-deletion-{{ $kamar->id }}')"
                                        x-on:click="$dispatch('set-action', '{{ route('kamar.destroy', $kamar->id) }}')"
                                        >{{ __('Hapus') }}
                                    </x-danger-button>

                                </td>
                                </tr>

                                <!-- Modal Konfirmasi Penghapusan -->
                                <x-modal name="confirm-kamar-deletion-{{ $kamar->id }}" focusable maxWidth="xl">
                                <form method="POST" action="{{ route('kamar.destroy', $kamar->id) }}" class="p-6">
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
                                            {{ __('Tidak') }}
                                        </x-secondary-button>
                                        <x-danger-button class="ml-8">
                                            {{ __('Hapus!!!') }}
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
