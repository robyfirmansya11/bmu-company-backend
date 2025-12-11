<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Careers extends Model
{
    protected $table = 'careers';

    protected $fillable = [
        'title',
        'slug',
        'location',
        'type',
        'description',
        'requirements',
        'image',
        'published_at',
        // 'meta_title',
        // 'meta_description',
    ];

    protected $casts = [
        'requirements' => 'array',
        'published_at' => 'datetime',
    ];

    // 🔹 Satu method boot saja (gabungan logika sebelumnya)
    protected static function booted()
    {
        static::saving(function ($career) {
            // Auto-generate slug jika kosong
            if (empty($career->slug) && !empty($career->title)) {
                $career->slug = Str::slug($career->title);

                // Tambahkan 6 karakter acak jika slug sudah ada di DB
                if (self::where('slug', $career->slug)->exists()) {
                    $career->slug .= '-' . Str::random(6);
                }
            }
        });
    }

    // 🔹 Helper untuk ambil URL gambar di storage
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
