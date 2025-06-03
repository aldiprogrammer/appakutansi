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
        Schema::create('transaksi_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('marketplace', 50);
            $table->string('store', 20);
            $table->string('wa', 16);
            $table->string('customer', 35);
            $table->string('rekening');
            $table->string('produk');
            $table->string('transaksi');
            $table->string('rate');
            $table->string('admin');
            $table->string('biaya');
            $table->string('transfer');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pelanggans');
    }
};
