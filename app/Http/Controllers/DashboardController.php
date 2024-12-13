<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
public function index(Request $request){
        $categoryId =$request->get('category');


        //Ngambil dari menu
        $query = Menu::with('category');
        if ($categoryId) {
            $query->where('id_category', $categoryId);
            }
            $Menus = $query->get();

            //ambil kategori
            $categories = Category::all();

            return view('dashboard', compact('Menus', 'categories'));
    }

}
