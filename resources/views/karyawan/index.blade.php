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

                    @if (session('success'))
                        <div id="success-notification" class="bg-green-500 text-white p-4 rounded">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('success-notification')?.remove();
                            }, 4000);
                        </script>
                    @endif

                    <br>
                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('karyawan.search') }}" class="mb-4">
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

                    <x-table class="border-collapse border-5 border-black" cellspacing="0">
                        <x-slot name="header">
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">Tipe Kamar</th>
                                <th class="text-center">Status Kamar</th>
                                <th class="text-center">Kondisi Kamar</th>
                                <th class="text-center">Status Fasilitas</th>
                                <th class="text-center">Catatan</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </x-slot>
                        @foreach ($kamars as $index => $kamar)
                            <tr>
                                <td class="text-center">{{ $kamar->id}}</td>
                                <td class="text-center">{{ $kamar->tipe_kamar }}</td>
                                <td class="text-center">{{ $kamar->status_kamar }}</td>
                                <td class="text-center">{{ $kamar->kondisi_kamar }}</td>
                                <td class="text-center">{{ $kamar->status_fasilitas }}</td>
                                <td class="text-center">{{ $kamar->catatan }}</td>
                                <td class="text-center">{{ $kamar->updated_at }}</td>
                                <td class="text-center">
                                    <x-primary-button 
                                        onclick="window.location='{{ route('karyawan.edit', $kamar->id) }}'" 
                                        class="bg-yellow-400">Edit
                                    </x-primary-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
