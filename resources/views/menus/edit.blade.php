<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl text-blue-600">Edit Menu</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{$menu->foto}}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('menus.update', $menu) }}" class="flex gap-8">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md">
                </div>
                <div class="w-1/2">
                    {{-- foto --}}
                    <div class="flex items-center">
                        <div x-data="{ imageUrl: '{{ asset('storage/'.$menu->foto) }}' }">
                            <input type="file" id="foto" name="foto" accept="image/*"
                                   class="mt-4 w-full border-gray-700 rounded-md shadow-sm text-gray-300 bg-gray-800 "
                                   @change="imageUrl = URL.createObjectURL($event.target.files[0])">
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>
                    </div>

                    {{-- nama --}}
                    <div>
                        <x-input-label for="name" :value="('name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$menu->name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- harga --}}
                    <div class="mt-4">
                        <x-input-label for="price" :value="('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$menu->price" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    {{-- deskripsi --}}
                    <div class="mt-4">
                        <x-input-label for="description" :value="('description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$menu->description" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- categori --}}
                    <div>
                        <x-input-label for="id_category" :value="('Category')" />
                        <select id="id_category" name="id_category" required
                                class="block mt-2 w-full border-gray-700 rounded-md shadow-sm text-gray-300 bg-gray-800 focus:border-blue-500 focus:ring focus:ring-blue-500">
                            <option value="">Cari Categori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $menu->id_category == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_category')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-5">
                        {{ __('Selesai') }}
                    </x-primary-button>
                </div>



            </form>

        </div>


    </div>
</x-app-layout>