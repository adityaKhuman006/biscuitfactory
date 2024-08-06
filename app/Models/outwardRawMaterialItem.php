<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outwardRawMaterialItem extends Model
{
    use HasFactory;

    protected $table = 'outward_raw_material_item';

    // Fillable attributes
    protected $fillable = [
        'material_out_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
