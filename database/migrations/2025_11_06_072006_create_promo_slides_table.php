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
        Schema::create('promo_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // "Promo Buah Segar"
            $table->text('description'); // "Diskon hingga 50%..."
            $table->string('image'); // Gambar background
            $table->string('overlay_text')->nullable(); // "50% OFF"
            $table->string('button_text'); // "Belanja Sekarang"
            $table->string('link'); // URL tujuan saat diklik
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_slides');
    }
};
