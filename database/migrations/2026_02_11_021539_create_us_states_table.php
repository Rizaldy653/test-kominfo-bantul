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
        Schema::create('us_states', function (Blueprint $table) {
            $table->smallInteger('state_id')->primary();
            $table->string('state_name', 100)->nullable();
            $table->string('state_abbr', 2)->nullable();
            $table->string('state_region', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('us_states');
    }
};
