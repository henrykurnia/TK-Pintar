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
            $table->string('url');
            $table->enum('jenis', ['teacher', 'student', 'article']);
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('owner_type')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index('jenis', 'image_urls_jenis_index');
            $table->index(['owner_id', 'owner_type'], 'image_urls_owner_id_owner_type_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_url');
    }
};
