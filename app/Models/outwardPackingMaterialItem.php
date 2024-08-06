<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outwardPackingMaterialItem extends Model
{
    use HasFactory;

    protected $table = 'outward_packing_material_item';

    // Fillable attributes
    protected $fillable = [
        'Packing_out_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
