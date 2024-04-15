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
        Schema::create('etageres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->integer('capacity');
            $table->unsignedBigInteger('rayon_id');
            $table->unsignedBigInteger('colone_id');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('cascade');
            $table->foreign('colone_id')->references('id')->on('colones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etageres');
    }
};
