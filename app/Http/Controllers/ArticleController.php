<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ImageUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('image')->latest()->get();
        return view('admin.artikel.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.artikel.tambah_artikel');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $article = Article::create([
                'user_id' => Auth::id(),
                'title' => $validated['title'],
                'content' => $validated['content'],
                'date' => now(),
            ]);

            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('articles'), $fileName);

                ImageUrl::create([
                    'url' => 'articles/' . $fileName, // ✔️ tanpa slash di depan
                    'jenis' => 'article',
                    'owner_id' => $article->id,
                    'owner_type' => Article::class,
                ]);
            }

            return redirect()->route('articles.index')
                ->with('success', 'Artikel berhasil ditambahkan!');

        } catch (\Exception $e) {
            \Log::error('Gagal tambah artikel: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan artikel: ' . $e->getMessage());
        }
    }

    public function edit(Article $article)
    {
        $article->load('image');
        return view('admin.artikel.edit_artikel', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->hasFile('url')) {
            if ($article->image) {
                $oldImagePath = public_path($article->image->url);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $article->image()->delete();
            }

            $file = $request->file('url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('articles'), $fileName);

            $article->image()->create([
                'url' => 'articles/' . $fileName,
                'jenis' => 'article',
            ]);
        }

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            $imagePath = public_path($article->image->url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $article->image()->delete();
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
