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
        Schema::table('posts', function (Blueprint $table) {
            // Mengubah tipe kolom thumbnail_image dari string ke text
            // Sesuaikan jika kamu sebelumnya pakai string
            $table->text('thumbnail_image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Mengembalikan tipe kolom ke string (atau tipe sebelumnya)
            // Pastikan ini sesuai dengan tipe kolom awal kamu
            $table->string('thumbnail_image')->nullable()->change();
        });
    }
};