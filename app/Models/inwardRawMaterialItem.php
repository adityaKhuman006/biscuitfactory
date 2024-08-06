<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawMaterialItem extends Model
{
    use HasFactory;

    protected $table = 'inward_raw_material_item';

    // Fillable attributes
    protected $fillable = [
        'material_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
