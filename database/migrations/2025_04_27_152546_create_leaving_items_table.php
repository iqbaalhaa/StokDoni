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
        Schema::create('leaving_items', function (Blueprint $table) {
            $table->id();

            $table->string('kode_barang');
            $table->integer('jumlah')->unsigned();
            $table->string('nama_costumer');
            
            $table->foreign('kode_barang')->references('kode_barang')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nama_costumer')->references('nama')->on('costumers')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaving_items');
    }
};
