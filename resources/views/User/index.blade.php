<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="sm:rounded-lg">    
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


                <x-primary-button class="justify-center w-full sm:w-auto " onclick="window.location='{{ route('user.create') }}'">Tambah Akun</x-primary-button>
                <br>
                <br>

                    <!-- Tabel Data Users -->
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Telphone</th>
                                <th class="text-center">Aksi</th>

                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $num++ }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->Telphone }}</td>
                                <td class=" text-center">
                                    <x-primary-button 
                                        x-data=""
                                        onclick="window.location='{{ route('user.edit', $user->id) }}'" class="bg-yellow-400">Edit
                                    </x-primary-button>

                                    <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $user->id }}')"
                                        x-on:click="$dispatch('set-action', '{{ route('user.destroy', $user->id) }}')"
                                        >{{ __('Delete') }}</x-danger-button>

                                </td>
                                </tr>

                                <!-- Modal Konfirmasi Penghapusan -->
                                <x-modal name="confirm-user-deletion-{{ $user->id }}" focusable maxWidth="xl">
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="p-6">
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
