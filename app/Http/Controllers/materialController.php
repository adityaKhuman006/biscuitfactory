<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\inwardRawFinishedgood;
use App\Models\inwardRawFinishedgoodItem;
use App\Models\inwardRawMachinery;
use App\Models\inwardRawMachineryItem;
use App\Models\inwardRawMaterial;
use App\Models\inwardRawMaterialItem;
use App\Models\inwardRawPacking;
use App\Models\inwardRawPackingItem;
use App\Models\material;
use App\Models\outwardFinishedgoodMaterial;
use App\Models\outwardFinishedgoodMaterialItem;
use App\Models\outwardMachineryMaterial;
use App\Models\outwardMachineryMaterialItem;
use App\Models\outwardPackingMaterial;
use App\Models\outwardPackingMaterialItem;
use App\Models\outwardRawMaterial;
use App\Models\outwardRawMaterialItem;
use App\Models\Product;
use Illuminate\Http\Request;

class materialController extends Controller
{

    function index(Request $request)
    {
        return view('home');
    }

    public function admin(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('index', ['products' => $products]);
    }

    public function selectCategory(Request $request)
    {
        return view('select-category');
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

        return redirect()->route('admin');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin');
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
            $batchNumber = $data['batch_number'] ?? 1;
            Batch::create([
                "product_id" => $data['product_id'],
                "material_id" => $materialId,
                "actual_weight" => $data[$actualWeightKey],
                "batch_number" => $batchNumber + 1,
                "date" => $data['date'],
                "time" => $data['time'],
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
        $batches = Batch::with(['getProduct', 'getMaterial'])->groupBy('batch_number', 'product_id')->get();
        return view('rep', compact('batches'));
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

        return redirect()->route('admin');
    }

    public function getProductionData(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $materials = Material::where('product_id', $id)->get();

        $batch = Batch::where('product_id', $id)
            ->orderBy('batch_number', 'desc')
            ->first();

        $batchNumber = $batch ? (int) $batch->batch_number : 0;

        if ($batchNumber == 0) {
            $batchNumber = 1;
        }

        $html = view('production-data', compact('product', 'materials', 'batchNumber'))->render();

        return response()->json([
            "html" => $html
        ]);
    }

    public function getMaterial(Request $request)
    {
        $materials = Batch::with(['getProduct', 'getMaterial'])->where('product_id', $request->productId)->where('batch_number', $request->batchId)->get();
        $html = view('material-data', compact('materials'))->render();
        return response()->json([
            "html" => $html
        ]);
    }


    // raw matiriyal -------------------------------------------------------------------

    public function RawMaterialIn()
    {
        return view('raw-material-in');
    }

    public function RawMaterialOut()
    {
        return view('raw-material-out');
    }

    public function RawMaterialCreate(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardRawMaterial = inwardRawMaterial::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                inwardRawMaterialItem::create([
                    'material_id' => $inwardRawMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }

    public function RawMaterialCreateOut(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardRawMaterial = outwardRawMaterial::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                outwardRawMaterialItem::create([
                    'material_out_id' => $inwardRawMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    // Packing-material-------------------------------------------------------------------

    public function PackingMaterialIn()
    {
        return view('packing-material-in');
    }

    public function PackingMaterialOut()
    {
        return view('packing-material-out');
    }

    public function PackingMaterialCreate(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardPackingMaterial = inwardRawPacking::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                inwardRawPackingItem::create([
                    'packing_id' => $inwardPackingMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    public function PackingMaterialCreateOut(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardRawMaterial = outwardPackingMaterial::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                outwardPackingMaterialItem::create([
                    'Packing_out_id' => $inwardRawMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    // machinery-material--------------------------------------------------------------

    public function machineryMaterialIn()
    {
        return view('machinery-items-in');
    }

    public function machineryMaterialOut()
    {
        return view('machinery-items-out');
    }

    public function machineryMaterialCreate(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $machinery = inwardRawMachinery::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                inwardRawMachineryItem::create([
                    'machinery_id' => $machinery->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    public function machineryMaterialCreateOut(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardRawMaterial = outwardMachineryMaterial::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                outwardMachineryMaterialItem::create([
                    'machinery_out_id' => $inwardRawMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    // finishedgood-material---------------------------------------------------------------

    public function finishedgoodMaterialIn()
    {
        return view('finished-good-in');
    }

    public function finishedgoodMaterialOut()
    {
        return view('finished-good-out');
    }

    public function finishedgoodMaterialCreate(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $finishedgood = inwardRawFinishedgood::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                inwardRawFinishedgoodItem::create([
                    'finishedgood_id' => $finishedgood->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    public function finishedgoodMaterialCreateOut(Request $request)
    {
        $originalFile = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationPath = 'public/img/';
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }

        $inwardRawMaterial = outwardFinishedgoodMaterial::create([
            'date' => $request->date,
            'time' => $request->time,
            'compaey_name' => $request->compaey_name,
            'location' => $request->location,
            'inv_challan_number' => $request->inv_challan_number,
            'inv_challan_date' => $request->inv_challan_date,
            'vehicle_number' => $request->vehicle_number,
            'mobile' => $request->mobile,
            'img' => $originalFile,
        ]);

        $data = $request->all();
        $items = $data['category-group'] ?? [];

        foreach ($items as $itemAdd) {
            if (
                isset($itemAdd['item'], $itemAdd['quantity'], $itemAdd['uom'], $itemAdd['rate'], $itemAdd['amount']) &&
                !empty($itemAdd['item']) && !empty($itemAdd['quantity']) && !empty($itemAdd['uom']) &&
                !empty($itemAdd['rate']) && !empty($itemAdd['amount'])
            ) {
                outwardFinishedgoodMaterialItem::create([
                    'finishedgood_out_id' => $inwardRawMaterial->id,
                    'item' => $itemAdd['item'],
                    'quantity' => $itemAdd['quantity'],
                    'uom' => $itemAdd['uom'],
                    'rate' => $itemAdd['rate'],
                    'amount' => $itemAdd['amount'],
                ]);
            }
        }
        return response()->json([]);
    }


    public function security()
    {
        return view('security');
    }
    public function getin()
    {
        return view('getin');
    }

    public function getout()
    {
        return view('getout');
    }
    public function productMaster()
    {
        return view('product-master');
    }

    public function transferMaterial()
    {
        return view('transfer-material');
    }
    public function typeMaster()
    {
        return view('type-master');
    }
    public function getInReport()
    {
        return view('get-in-report');
    }
    public function getOutReport()
    {
        return view('get-out-report');
    }
    public function transferReaport()
    {
        return view('transfer-reaport');
    }
}
