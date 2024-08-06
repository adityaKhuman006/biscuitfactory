<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outwardMachineryMaterial extends Model
{
    use HasFactory;

    protected $table = 'outward_machinery_material';

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
