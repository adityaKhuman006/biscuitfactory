<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    // Fillable attributes
    protected $fillable = ['item_name', 'recipie_weight', 'umd'];
}
