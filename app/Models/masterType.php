<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterType extends Model
{
    use HasFactory;

    protected $table = 'master_type';

    // Fillable attributes
    protected $fillable = [
        'product_name',
        'rm',
    ];
}
