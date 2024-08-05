<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';

    // Fillable attributes
    protected $fillable = [
        'product_id',
        'item_name',
        'recipie_weight',
        'umd',
        'actual_weight'
    ];
}
