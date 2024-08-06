<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inwardRawMachinery extends Model
{
    use HasFactory;

    protected $table = 'inward_machinery_material';

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
