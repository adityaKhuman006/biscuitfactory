<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outwardFinishedgoodMaterialItem extends Model
{
    use HasFactory;

    protected $table = 'outward_finishedgood_material_item';

    // Fillable attributes
    protected $fillable = [
        'finishedgood_out_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
