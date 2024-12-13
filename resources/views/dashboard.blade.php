<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            <!-- Bagian List Menu -->
            <div class="flex mt-6 items-center justify-between">
                <h2 class="font-semibold text-xl text-white">Menu</h2>
            </div>

            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
                @foreach ($Menus as $menu)
                    <div class="border border-gray-300 rounded-lg p-4 bg-white">
                        <img src="{{ url('storage/' . $menu->foto) }}" class="rounded-md" style="width:300px">
                        <div class="my-2">
                            <p class="text-xl font-light text-gray-800">{{$menu->name}}</p>
                            <p class="font-semibold text-gray-800">Rp. {{number_format($menu->price)}}</p>
                            <p class="text-xl font-light text-gray-800">{{$menu->category->name}}</p>
                            <p class="text-gray-600">{{$menu->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>