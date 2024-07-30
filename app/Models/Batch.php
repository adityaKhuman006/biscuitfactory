<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "material_id",
        "actual_weight",
        "batch_number",
        "date",
        "time",
    ];

}
