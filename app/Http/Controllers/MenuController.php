<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{

//tampil
    public function index()
    {
        $Menus = Menu::all();

        return view('menus.index', compact('Menus')); 
    }

    //buat bikin menu
    public function create()
    {
        $categories = Category::get();

        return view('menus.create', ['categories' => $categories]);
    }

    //kirim database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'id_category' => 'required|exists:category,id', 
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName()); 

        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'id_category' => $request->id_category,
            'foto' => $foto->hashName(), 
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    //edit
    public function edit($id)
    {
    $menu = Menu::findOrFail($id); 
    $categories = Category::all(); 

    return view('menus.edit', compact('menu', 'categories'));
    }

//kirim database setelah edit
    public function update($id, Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'price' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg', 
        'id_category' => 'required|exists:category,id', 
    ]);

    $menu = Menu::findOrFail($id);
    
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());
        $menu->foto = $foto->hashName(); 
    }

    $menu->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'id_category' => $request->id_category,

        
    ]);
    

    return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
}

//hapussssssss
    public function delete($id) {
        Menu::findOrFail($id)->delete();

        return redirect()->route('menus.index');

}
}
