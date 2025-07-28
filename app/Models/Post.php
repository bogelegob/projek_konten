<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'url_content',         // Tambahkan ini
        'thumbnail_image',     // Tambahkan ini
        'social_media_platform', // Tambahkan ini
        'upload_date',         // Tambahkan ini
    ];

    // Jika Anda ingin mengelola tanggal secara otomatis, Laravel sudah memiliki created_at dan updated_at.
    // Jika Anda ingin 'tanggal dibuat' dan 'tanggal diedit' yang terpisah dari created_at/updated_at,
    // Anda bisa menambahkan 'edited_at' di migrasi dan di fillable.
    // Namun, umumnya created_at dan updated_at sudah cukup untuk 'tanggal dibuat' dan 'tanggal diedit'.
}