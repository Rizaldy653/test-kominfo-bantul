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
        Schema::create('orders', function (Blueprint $table) {
            $table->smallInteger('order_id')->primary();
            $table->char('customer_id')->nullable();
            $table->smallInteger('employee_id')->nullable();
            $table->date('order_date')->nullable();
            $table->date('required_date')->nullable();
            $table->date('shipped_date')->nullable();
            $table->smallInteger('ship_via')->nullable();
            $table->float('freight')->nullable();
            $table->string('ship_name', 40)->nullable();
            $table->string('ship_address', 60)->nullable();
            $table->string('ship_city', 15)->nullable();
            $table->string('ship_region', 15)->nullable();
            $table->string('ship_postal_code', 10)->nullable();
            $table->string('ship_country', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
