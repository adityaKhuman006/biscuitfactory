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
        Schema::create('outward_packing_material_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Packing_out_id');
            $table->foreign('Packing_out_id')->references('id')->on('outward_packing_material')->onDelete('cascade')->onUpdate('cascade');

            $table->string('item');
            $table->string('quantity');
            $table->string('uom');
            $table->string('rate');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outward_packing_material_item');
    }
};
