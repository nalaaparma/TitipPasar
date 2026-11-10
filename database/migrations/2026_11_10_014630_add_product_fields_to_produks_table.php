<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('nama_produk');
            $table->string('kategori');
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn([
                'nama_produk',
                'kategori',
                'harga',
                'stok',
                'deskripsi',
                'foto',
            ]);
        });
    }
};
