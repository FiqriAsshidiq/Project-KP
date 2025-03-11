<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
    {{ __('Kamar') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <div >

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


                    <!-- tombol tambah -->
                    
                            <!-- Form Pencarian -->
                            <form method="GET" action="{{ route('kamar.search') }}" class="mt-4 px-6">
                                <div class="flex items-center">
                                    <input 
                                        type="text" 
                                        name="search" 
                                        value="{{ request('search') }}" 
                                        placeholder="Cari kondisi kamar..." 
                                        class="border border-gray-300 rounded p-2 w-full sm:w-1/3"
                                    >
                                    <x-primary-button class="ml-4">
                                        {{ __('Cari') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>

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
                            </tr>
                        </x-slot>
                        @foreach ($kamars as $index => $kamar)
                            <tr>
                                <td class=" text-center">{{ $kamar->id }}</td>
                                <td class=" text-center">{{ $kamar->tipe_kamar }}</td>
                                <td class=" text-center">{{ $kamar->status_kamar }}</td>
                                <td class=" text-center">{{ $kamar->kondisi_kamar }}</td>
                                <td class=" text-center">{{ $kamar->status_fasilitas }}</td>
                                <td class=" text-center">{{ $kamar->catatan }}</td>
                                <td class=" text-center">{{ $kamar->updated_at }}</td>
                        @endforeach
                        </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
