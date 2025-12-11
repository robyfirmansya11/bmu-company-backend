<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{



 public function index()
{
    $news = News::latest()->get();
    foreach ($news as $item) {
        $item->image_url = $item->image ? asset('storage/'.$item->image) : null;
    }
    return response()->json($news);
}

public function show($slug)
{
    $news = News::where('slug', $slug)->first();

    if (!$news) {
        return response()->json(['message' => 'Not found'], 404);
    }

    $news->image_url = $news->image ? asset('storage/'.$news->image) : null;

    return response()->json($news);
}
}