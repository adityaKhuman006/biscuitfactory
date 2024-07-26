<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request){
        $materials = Material::all();
        return view('index', compact('materials'));
    }
    
    public function create(Request $request)
    {
        $categoryData = $request->input('category-group');

        foreach ($categoryData as $data) {
            Material::create([
                "item_name" => $data['item_name'],
                "recipie_weight" => $data['recipie_weight'],
                "umd" => $data['umd']
            ]);
        }
        
        return redirect()->route('index');
    
    }
}
