<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawFinishedgoodItem extends Model
{
    use HasFactory;

    protected $table = 'inward_finishedgood_material_item';

    // Fillable attributes
    protected $fillable = [
        'finishedgood_id',
        'item',
        'quantity',
        'uom',
        'rate',
        'amount',
    ];
}
