<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitraSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('sale_date');
            $table->smallInteger('sale_month');
            $table->integer('sale_year');
            $table->string('sales_id');
            $table->string('sale_day');
            $table->string('mitra_name');
            $table->tinyInteger('area_code');
            $table->tinyInteger('mitra_type');
            $table->smallInteger('brand_code');
            $table->string('product_name');
            $table->smallInteger('package_code');
            $table->decimal('sales_val_a',50,2)->nullable();
            $table->decimal('sales_val_b',50,2)->nullable();
            $table->decimal('sales_target',50,2)->nullable();
            $table->decimal('sales_vol_a',50,2)->nullable();
            $table->decimal('sales_vol_b',50,2)->nullable();
            $table->decimal('target_vol',50,2)->nullable();
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
        Schema::dropIfExists('mitra_sales');
    }
}
