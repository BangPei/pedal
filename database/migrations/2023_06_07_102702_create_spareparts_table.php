<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->foreignId('uom_id')->references('id')->on('uoms');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('item_brand_id')->references('id')->on('item_brands');
            $table->foreignId('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('min_price', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('genuine_status')->default(true);
            $table->boolean('is_fast_moving')->default(true);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
};
