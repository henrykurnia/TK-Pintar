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
        Schema::create('support_center', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('wa_number')->nullable();
            // Set charset dan collation ke utf8mb4_general_ci sesuai SQL
           // $table->charset = 'utf8mb4';
            //$table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_center');
    }
};
