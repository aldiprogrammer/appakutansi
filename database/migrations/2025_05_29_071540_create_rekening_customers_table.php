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
        Schema::create('rekening_customers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_customer', 35);
            $table->string('rekening', 50);
            $table->string('no_rekening', 30);
            $table->string('nama_rekening', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening_customers');
    }
};