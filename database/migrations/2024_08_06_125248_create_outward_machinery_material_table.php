<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('outward_machinery_material', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('compaey_name');
            $table->string('location');
            $table->string('inv_challan_number');
            $table->string('inv_challan_date');
            $table->string('vehicle_number');
            $table->string('mobile');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outward_machinery_material');
    }
};
