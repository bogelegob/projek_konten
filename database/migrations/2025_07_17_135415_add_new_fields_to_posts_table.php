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
            // Kolom baru
            $table->string('url_content')->nullable()->after('content');
            $table->string('thumbnail_image')->nullable()->after('url_content');
            $table->enum('social_media_platform', ['youtube', 'tiktok', 'instagram'])->nullable()->after('thumbnail_image');
            $table->date('upload_date')->nullable()->after('social_media_platform');
            // 'created_at' dan 'updated_at' sudah ada secara default dari timestamps()
            // Kita bisa menambahkan kolom 'edited_at' jika ingin mencatat waktu edit secara terpisah dari updated_at
            // $table->timestamp('edited_at')->nullable()->after('updated_date'); // Jika ingin kolom terpisah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Hapus kolom jika migrasi di-rollback
            $table->dropColumn([
                'url_content',
                'thumbnail_image',
                'social_media_platform',
                'upload_date',
                // 'edited_at' // Jika ditambahkan di atas
            ]);
        });
    }
};