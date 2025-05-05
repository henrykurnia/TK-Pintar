<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil 6 artikel terbaru dengan gambar
        $articles = Article::with('image')
            ->latest()
            ->take(6)
            ->get();

        return view('landing.index', compact('articles'));
    }

    public function showArticle($id)
    {
        // Detail artikel
        $article = Article::with('image')->findOrFail($id);
        return view('landing.article_detail', compact('article'));
    }
}