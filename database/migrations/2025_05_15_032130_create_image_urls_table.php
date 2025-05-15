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
        Schema::create('image_urls', function (Blueprint $table) {
            $table->id();
            $table->string('url', 255);
            $table->enum('jenis', ['teacher', 'student', 'article']);
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('owner_type', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_urls');
    }
};
