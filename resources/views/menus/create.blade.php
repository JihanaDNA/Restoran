<x-app-layout>
    <div class="flex mt-6">
        <h2 class="font-semibold text-xl text-blue-600">Tambah Menu</h2>
    </div>

    <div class="mt-4" x-data="(imageUrl: '{{asset('storage/')}})">
        <form enctype="multipart/form-data" method="POST" action="{{route('menus.store')}}" class="flex gap-8">
            @csrf

            <div class="w-full">
                <div>
                    <x-input-label for="foto" :value="__('foto')" />
                    <x-text-input accept="/storage" id="foto" class="block mt-1 w-full border" type="file" name="foto" :value="old('foto')" required
                    @change="imageUrl = URL.createObjectURL($event.target.files[0])"
                    />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>

                {{-- nama --}}
                <div>
                    <x-input-label for="name" :value="__('name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- harga --}}
                <div>
                    <x-input-label for="price" :value="__('price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                {{-- kategori --}}
                <div class="mt-4">
                    <label for="id_category" class="block text-sm font-medium text-white">Categori</label>
                    <select name="id_category" id="id_category" required
                            class="mt-1 block w-full border-white-300 rounded-md shadow-sm">
                        <option value=""> Cari Categori </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- deskripsi --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <x-primary-button class="justify-center w-full mt-5">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
</x-app-layout>
