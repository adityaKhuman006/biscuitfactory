<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\material;
use App\Models\Product;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request)
    {
        // $materials = Material::all();
        $products = Product::orderBy('id', 'desc')->get();
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
        $product = Product::where('id', $id)->first();
        $materials = Material::where('product_id', $id)->get();
        return view('product-edit', compact('product', 'materials'));
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
        foreach ($data['material_id'] as $materialId) {
            $actualWeightKey = 'actual_weight_' . $materialId;
            Material::where('id', $materialId)->update([
                "actual_weight" => $data[$actualWeightKey],
            ]);
        }

        foreach ($data['material_id'] as $materialId) {
            $actualWeightKey = 'actual_weight_' . $materialId;
            $batchNumber =  $data['batch_number'] ?? 1;
            Batch::create([
                "product_id" =>$data['product_id'],
                "material_id" => $materialId,
                "actual_weight"=>$data[$actualWeightKey],
                "batch_number"=>$batchNumber + 1,
                "date"=>$data['date'],
                "time"=>$data['time'],
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

    public function productUpdate(Request $request)
    {
        $data = $request->all();
        $productId = $data['product-id'];
        Product::where('id', $productId)->update([
            "product_name" => $data['product_name'],
            "batch_size" => $data['batch_size'],
            "batch_required" => $data['batch_required'],
        ]);

        if (isset($data['material_id']) && $data['material_id']) {
            foreach ($data['material_id'] as $id) {
                $itemNameKey = "old-item_name_" . $id;
                $itemRecipieWeight_Key = "old-recipie_weight_" . $id;
                $itemUmdKey = "old-umd_" . $id;
                Material::where('id', $id)->update([
                    "item_name" => $data[$itemNameKey],
                    "recipie_weight" => $data[$itemRecipieWeight_Key],
                    "umd" => $data[$itemUmdKey],
                ]);
            }
        }

        if (isset($data['category-group']) && $data['category-group']) {
            foreach ($data['category-group'] as $item) {
                if ($item['item_name'] && $item['recipie_weight'] && $item['umd']) {
                    Material::create([
                        "product_id" => $productId,
                        "item_name" => $item['item_name'],
                        "recipie_weight" => $item['recipie_weight'],
                        "umd" => $item['umd'],
                    ]);
                }
            }
        }

        return redirect()->route('index');
    }

    public function getProductionData(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $materials = Material::where('product_id', $id)->get();

        $batch = Batch::where('product_id', $id)
            ->orderBy('batch_number', 'desc')
            ->first();

        $batchNumber = $batch ? (int)$batch->batch_number : 0;

        if ($batchNumber == 0) {
            $batchNumber = 1;
        }

        $html = view('production-data',compact('product','materials','batchNumber'))->render();

        return response()->json([
            "html" => $html
        ]);
    }
}
