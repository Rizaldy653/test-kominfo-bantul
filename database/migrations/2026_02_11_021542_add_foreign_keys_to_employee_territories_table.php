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
        Schema::table('employee_territories', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'employee_territories_employee_id_fkey')->references(['employee_id'])->on('employees')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['territory_id'], 'employee_territories_territory_id_fkey')->references(['territory_id'])->on('territories')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_territories', function (Blueprint $table) {
            $table->dropForeign('employee_territories_employee_id_fkey');
            $table->dropForeign('employee_territories_territory_id_fkey');
        });
    }
};
