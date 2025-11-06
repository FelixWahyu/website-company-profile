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
        Schema::table('products', function (Blueprint $table) {
            // 1. Tambahkan Foreign Key untuk Kategori
            $table->foreignId('category_id')
                ->nullable()
                ->after('description') // Posisikan setelah deskripsi
                ->constrained('categories')
                ->onDelete('set null');

            // 2. Tambahkan kolom untuk Promo
            $table->boolean('is_promo')
                ->default(false)
                ->after('price'); // Posisikan setelah harga

            // 3. Tambahkan kolom untuk Harga Promo
            $table->decimal('promo_price', 15, 2)
                ->nullable()
                ->after('is_promo'); // Posisikan setelah is_promo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'is_promo', 'promo_price']);
        });
    }
};
