<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Tambah Akun Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('pengguna.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                            <select id="role_id" name="role_id" 
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->posisi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('pengguna') }}" class="mr-4 text-blue-600 hover:underline">Kembali</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
