<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawFinishedgood extends Model
{
    use HasFactory;

    protected $table = 'inward_finishedgood_material';

    // Fillable attributes
    protected $fillable = [
        'date',
        'time',
        'compaey_name',
        'location',
        'inv_challan_number',
        'inv_challan_date',
        'vehicle_number',
        'mobile',
        'img',
    ];
}
