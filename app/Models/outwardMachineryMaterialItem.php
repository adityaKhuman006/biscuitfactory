<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outwardMachineryMaterialItem extends Model
{
    use HasFactory;

    protected $table = 'outward_machinery_material_item';

    // Fillable attributes
    protected $fillable = [
        'machinery_out_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
