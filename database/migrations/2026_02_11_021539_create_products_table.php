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
        Schema::create('products', function (Blueprint $table) {
            $table->smallInteger('product_id')->primary();
            $table->string('product_name', 40);
            $table->smallInteger('supplier_id')->nullable();
            $table->smallInteger('category_id')->nullable();
            $table->string('quantity_per_unit', 20)->nullable();
            $table->float('unit_price')->nullable();
            $table->smallInteger('units_in_stock')->nullable();
            $table->smallInteger('units_on_order')->nullable();
            $table->smallInteger('reorder_level')->nullable();
            $table->integer('discontinued');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
