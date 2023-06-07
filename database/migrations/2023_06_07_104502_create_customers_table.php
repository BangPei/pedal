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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("plate_no");
            $table->string("frame_no");
            $table->string("machine_no");
            $table->string("pic_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("npwp")->nullable();
            $table->string("npwp_address")->nullable();
            $table->integer("year");
            $table->boolean("is_active")->default(true);
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->foreignId('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->foreignId('color_id')->references('id')->on('colors');
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
        Schema::dropIfExists('customers');
    }
};
