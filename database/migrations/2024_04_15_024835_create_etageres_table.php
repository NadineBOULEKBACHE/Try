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
            $table->string('Etagere_libelle', 999);
            $table->unsignedBigInteger('rayons_id');
            $table->unsignedBigInteger('colones_id');
            $table->foreign('rayons_id')->references('id')->on('rayons')->onDelete('cascade');
            $table->foreign('colones_id')->references('id')->on('colones')->onDelete('cascade');
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
