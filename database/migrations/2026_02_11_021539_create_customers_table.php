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
        Schema::create('customers', function (Blueprint $table) {
            $table->char('customer_id')->primary();
            $table->string('company_name', 40);
            $table->string('contact_name', 30)->nullable();
            $table->string('contact_title', 30)->nullable();
            $table->string('address', 60)->nullable();
            $table->string('city', 15)->nullable();
            $table->string('region', 15)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('country', 15)->nullable();
            $table->string('phone', 24)->nullable();
            $table->string('fax', 24)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
