<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Categori') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 mt-6">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <!-- Category Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-white">Categori Nama</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md font-semibold">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>