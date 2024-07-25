<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request){
        return view('index');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required',
            'recipie_weight' => 'required|numeric',
            'umd' => 'required',
        ]);
        
        material::create($validatedData);        

        return redirect()->route('index');
    }
}
