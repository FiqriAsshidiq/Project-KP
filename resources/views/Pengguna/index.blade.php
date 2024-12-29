<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-primary-button class="justify-center w-full sm:w-auto " onclick="window.location='{{ route('pengguna.create') }}'">Tambah Akun</x-primary-button>

                    <!-- Tabel Data Users -->
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Password (Hashed)</th>
                                <th class="text-center">Aksi</th>

                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $num++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td class=" text-center">
                                    <x-secondary-button 
                                        tag="button"
                                        onclick="window.location='{{ route('pengguna.edit', $user->id) }}'">Edit
                                    </x-secondary-button>
                                </td>                                
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
