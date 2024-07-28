<?php

namespace App\Http\Controllers;

use App\Models\material;
use App\Models\Product;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request)
    {
        // $materials = Material::all();
        $products = Product::all();
        return view('index', ['products' => $products]);
        // return view('index');
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

        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'batch_size' => $request->input('batch_size'),
            'batch_required' => $request->input('batch_required'),
        ]);

        // Retrieve the product ID
        $productId = $product->id;

        // // Get the items from the request
        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $item) {

            if (!empty($item['item_name']) && !empty($item['recipie_weight']) && !empty($item['umd'])) {
                Material::create([
                    'product_id' => $productId,
                    'item_name' => $item['item_name'],
                    'recipie_weight' => $item['recipie_weight'],
                    'umd' => $item['umd'],
                ]);
            }
        }

        return redirect()->route('index');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('index');
    }

    public function ProductFatch(Request $request)
    {
        $materials = Material::all();
        $products = Product::all();
        return view('products.fatch', ['products' => $products], compact('materials'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $materials = Material::where('product_id', $id)->get();
        return view('product-edit', compact('product', 'materials'));
    }

    public function update(Request $request)
    {
        $productRules = [
            'product_name' => 'required|string|max:255',
            'batch_size' => 'required|numeric',
            'batch_required' => 'required|numeric',
            'product_id' => 'nullable|exists:products,id',
        ];

        $product = Product::find($request->input('product_id'));

        $product->update([
            'product_name' => $request->input('product_name'),
            'batch_size' => $request->input('batch_size'),
            'batch_required' => $request->input('batch_required'),
        ]);

        // Check if 'item_name' is set and is an array
        // if (isset($data['item_name']) && $data['item_name']) {
        //     dd($data['item_name']);
        //     foreach ($data['item_name'] as $key => $itemName) {
        //         $materialId = $data['material_id'][$key] ?? null;

        //         if ($materialId && Material::where('id', $materialId)->exists()) {
        //             Material::where('id', $materialId)->update([
        //                 "item_name" => $itemName,
        //                 "recipie_weight" => $data['recipie_weight'][$key] ?? null,
        //                 "umd" => $data['umd'][$key] ?? null,
        //             ]);
        //         }
        //     }
        // }
        // dd($data['item_name']);

        $data = $request->input('item_name');
        
        // dd($data);
        foreach ($data as $item) {
            if (!empty($item['item_name']) && !empty($item['recipie_weight']) && !empty($item['umd'])) {
                Material::create([
                    "item_name" => $item['item_name'],
                    "recipie_weight" => $item['recipie_weight'],
                    "umd" => $item['umd'],
                ]);
            }
        }



        return redirect()->route('index');
    }


    function production(Request $request)
    {
        $materials = Material::all();
        $product = Product::all();
        return view('production', compact('materials', 'product'));
    }


    function productionAdd(Request $request)
    {
        // Retrieve all the input data
        $data = $request->all();
        foreach ($data['prodect_id'] as $prodectId) {
            $actualWeightKey = 'actual_weight_' . $prodectId;
            Material::where('id', $prodectId)->update([
                "actual_weight" => $data[$actualWeightKey],
            ]);
        }

        return redirect()->route('production');
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

    function create(Request $request)
    {
        $materials = Material::all();
        return view('create', compact('materials'));
    }
}
