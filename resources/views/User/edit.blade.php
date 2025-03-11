<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Edit Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-5 px-2">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                <h1>
                    Form Edit User
                </h1>
                <hr>
                <br>    
                <div >
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                   <x-input-error class="mt-2" :messages="$errors->get('name')" />

                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="Telphone" class="block text-sm font-medium text-gray-700">Telphone</label>
                            <input type="Telphone" id="Telphone" name="Telphone" value="{{ $user->Telphone }}" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">password</label>
                            <input type="password" id="password" name="password" 
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="flex items-center justify-end">
                        <x-primary-button tag="a" href="{{ route('user') }}" class="mr-[10px] bg-red-400">Kembali</x-primary-button>
                        <x-primary-button class="bg-green-400">Simpan</x-primary-button>
                  </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
