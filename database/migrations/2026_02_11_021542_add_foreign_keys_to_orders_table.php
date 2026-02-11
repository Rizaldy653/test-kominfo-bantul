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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'orders_customer_id_fkey')->references(['customer_id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['employee_id'], 'orders_employee_id_fkey')->references(['employee_id'])->on('employees')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ship_via'], 'orders_ship_via_fkey')->references(['shipper_id'])->on('shippers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_fkey');
            $table->dropForeign('orders_employee_id_fkey');
            $table->dropForeign('orders_ship_via_fkey');
        });
    }
};
