<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
            <div class="flex mt-8 justify-end items-center">
                <!-- bagian tombol -->
                <a href="{{route('menus.create')}}">
                    <button class="text-white bg-pink-500 px-10 py-2 rounded-md font-semibold">Tambah Menu</button>
                </a>
            </div>            

            <!-- Bagian List Menu -->
            <div class="flex mt-6 items-center justify-between">
                <h2 class="font-semibold text-xl text-white">List Menu</h2>
            </div>

            <!-- Tabel List Menu -->
            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full border border-gray-300 bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">Foto</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">Nama</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">Harga</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">kategori</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">Deskripsi</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                        @foreach ($Menus as $menu)
                        <tr>
                            <td class="px-6 py-4">
                                <img src="{{ url('storage/' . $menu->foto) }}" alt="Foto Menu" class="w-20 h-20 object-cover">
                            </td>
                            <td class="px-6 py-4 text-white">{{$menu->name}}</td>
                            <td class="px-6 py-4 text-white">Rp. {{number_format($menu->price)}}</td>
                            <td class="px-6 py-4 text-white">{{$menu->category->name}}</td>                            
                            <td class="px-6 py-4 text-white">{{$menu->description}}</td>
                            <td class="px-6 py-8 flex space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}">
                                    <button class="bg-gray-500 px-4 py-2 rounded-md font-semibold text-white">Edit</button>
                                </a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('menus.delete', $menu->id) }}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-pink-500 px-4 py-2 rounded-md font-semibold text-white">hapus</button>
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 

</x-app-layout>
