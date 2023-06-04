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
        Schema::create('minuman', function (Blueprint $table) {
            $table->id('id_minuman');
            $table->string('nama_minuman');
            $table->string('kategori_minuman');
            $table->integer('harga_minuman');
            $table->string('gambar_minuman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minuman');
    }
};
