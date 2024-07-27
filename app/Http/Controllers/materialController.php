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
        'product_id' => 'nullable|exists:products,id', // Ensure product_id is valid if present
    ];

    // Validation rules for materials (conditional)
    $materialRules = [
        'category-group.*.item_name' => 'nullable|string|max:255',
        'category-group.*.recipie_weight' => 'nullable|numeric',
        'category-group.*.umd' => 'nullable|string|max:255',
        'category-group.*.material_id' => 'nullable|exists:materials,id' // Validate material_id if present
    ];

    // Validate product input
    $validatedData = $request->validate($productRules);

    // Validate materials if present in the request
    $categoryData = $request->input('category-group', []);
    if (!empty($categoryData)) {
        $request->validate($materialRules);
    }

    // Check if we are updating an existing product
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

    // Handle materials if provided
    if (!empty($categoryData)) {
        foreach ($categoryData as $data) {
            // Extract fields and ID from the current data
            $item_name = $data['item_name'] ?? null;
            $recipie_weight = $data['recipie_weight'] ?? null;
            $umd = $data['umd'] ?? null;
            $material_id = $data['material_id'] ?? null;

            if (!empty($item_name) || !empty($recipie_weight) || !empty($umd)) {
                if ($material_id) {
                    // Update existing record
                    $material = Material::find($material_id);
                    if ($material) {
                        $material->update([
                            "item_name" => $item_name,
                            "recipie_weight" => $recipie_weight,
                            "umd" => $umd
                        ]);
                    }
                } else {
                    // Create new record
                    Material::create([
                        "item_name" => $item_name,
                        "recipie_weight" => $recipie_weight,
                        "umd" => $umd
                    ]);
                }
            }
        }
    }

    // Redirect back to the form with a success message
    return redirect()->route('index')->with('success', 'Product and materials saved successfully.');
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
