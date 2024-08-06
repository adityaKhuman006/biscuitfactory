<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawMachineryItem extends Model
{
    use HasFactory;
    protected $table = 'inward_machinery_material_item';

    // Fillable attributes
    protected $fillable = [
        'machinery_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
