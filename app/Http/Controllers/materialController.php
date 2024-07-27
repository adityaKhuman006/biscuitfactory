<?php

namespace App\Http\Controllers;

use App\Models\material;
use App\Models\Product;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request)
    {
        $materials = Material::all();
        $products = Product::all();
        return view('index', ['products' => $products], compact('materials'));
    }

    public function productAdd(Request $request)
    {
        // Validation rules for product
        $productRules = [
            'product_name' => 'required|string|max:255',
            'batch_size' => 'required|numeric',
            'batch_required' => 'required|numeric',
            'product_id' => 'nullable|exists:products,id',
        ];
        $validatedData = $request->validate($productRules);

        if ($request->has('product_id') && $request->input('product_id')) {
            $product = Product::find($request->input('product_id'));

            if ($product) {
                // Update the product
                $product->update([
                    'product_name' => $request->input('product_name'),
                    'batch_size' => $request->input('batch_size'),
                    'batch_required' => $request->input('batch_required'),
                ]);
            } else {
                // Product ID does not exist in the database
                return redirect()->route('index')->with('error', 'Product not found.');
            }
        } else {
            // Add a new product
            $product = Product::create([
                'product_name' => $request->input('product_name'),
                'batch_size' => $request->input('batch_size'),
                'batch_required' => $request->input('batch_required'),
            ]);
        }

        // material create and update

        $data = $request->all();
        $items = $data['category-group']; 
        
        if(isset($data['item_name']) && $data['item_name']){
            foreach($data['item_name'] as $key => $itemName){
                material::where('id',$data['material_id'][$key])->update([
                    "item_name" => $data['item_name'][$key],
                    "recipie_weight"=>$data['recipie_weight'][$key],
                    "umd"=>$data['umd'][$key]
                ]);        
            }    
        }

        foreach($items as $item){
            material::create([
                "item_name" => $item['item_name'],
                "recipie_weight"=>$item['recipie_weight'],
                "umd"=>$item['umd']
            ]);
        }
        

        return redirect()->route('index');
    }




    function emp(Request $request)
    {
        $materials = Material::all();
        $product = Product::all();
        return view('emp', compact('materials', 'product'));
    }

    function choose(Request $request)
    {
        $materials = Material::all();
        return view('choose', compact('materials'));
    }

    function report(Request $request)
    {
        $materials = Material::all();
        return view('report', compact('materials'));
    }
}
