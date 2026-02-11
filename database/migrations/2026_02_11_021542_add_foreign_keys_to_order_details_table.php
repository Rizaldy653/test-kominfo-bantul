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
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign(['order_id'], 'order_details_order_id_fkey')->references(['order_id'])->on('orders')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['product_id'], 'order_details_product_id_fkey')->references(['product_id'])->on('products')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_order_id_fkey');
            $table->dropForeign('order_details_product_id_fkey');
        });
    }
};
