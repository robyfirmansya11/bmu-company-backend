<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Careers;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    // 🔹 Ambil semua data career (untuk halaman daftar lowongan)
    public function index()
    {
        $careers = Careers::query()
            ->orderByDesc('published_at')
            ->get(['id', 'title', 'slug', 'location', 'type', 'image', 'published_at']);

        return response()->json($careers);
    }

    // 🔹 Ambil detail satu career berdasarkan slug
    public function show($slug)
    {
        $career = Careers::where('slug', $slug)->firstOrFail();

        return response()->json([
            'id' => $career->id,
            'title' => $career->title,
            'slug' => $career->slug,
            'location' => $career->location,
            'type' => $career->type,
            'description' => $career->description,
            'requirements' => $career->requirements,
            'image' => $career->image_url,
            'published_at' => $career->published_at,
        ]);
    }
}
