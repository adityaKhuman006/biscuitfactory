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


        $data = $request->all();
        $items = $data['category-group'] ?? [];
    
        // Update existing materials
        if (isset($data['item_name']) && $data['item_name']) {
            foreach ($data['item_name'] as $key => $itemName) {
                $materialId = $data['material_id'][$key] ?? null;
    
                if ($materialId && Material::where('id', $materialId)->exists()) {
                    Material::where('id', $materialId)->update([
                        "item_name" => $itemName,
                        "recipie_weight" => $data['recipie_weight'][$key] ?? null,
                        "umd" => $data['umd'][$key] ?? null
                    ]);
                }
            }
        }
    
        // Create new materials
        foreach ($items as $item) {
            // Ensure all required fields are present and not empty
            if (!empty($item['item_name']) && !empty($item['recipie_weight']) && !empty($item['umd'])) {
                Material::create([
                    "item_name" => $item['item_name'],
                    "recipie_weight" => $item['recipie_weight'],
                    "umd" => $item['umd']
                ]);
            }
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

    function rep(Request $request)
    {
        $materials = Material::all();
        return view('rep', compact('materials'));
    }
    function view(Request $request)
    {
        $materials = Material::all();
        return view('view', compact('materials'));
    }
}
