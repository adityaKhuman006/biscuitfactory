<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawPackingItem extends Model
{
    use HasFactory;

    protected $table = 'inward_packing_material_item';

    // Fillable attributes
    protected $fillable = [
        'packing_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
