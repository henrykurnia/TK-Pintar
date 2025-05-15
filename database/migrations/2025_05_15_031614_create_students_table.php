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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('class_id');
            $table->string('name', 255);
            $table->string('number', 255)->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('ttl', 255)->nullable(); // TTL = tempat tanggal lahir
            $table->string('religion', 255)->nullable();
            $table->timestamps();

            // Foreign keys (optional, adjust to your schema)
             $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
             $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
