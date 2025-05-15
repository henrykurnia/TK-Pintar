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

    
    public function publicIndex()
    {
        $articles = Article::with('image')->latest()->get();
        return view('public.articles', compact('articles'));
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
                    'url' => 'articles/' . $fileName,
                    'jenis' => 'article',
                    'owner_id' => $article->id,
                    'owner_type' => Article::class,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil ditambahkan!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Gagal tambah artikel: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan artikel: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(Article $article)
    {
        $article->load('image');
        return view('admin.artikel.edit_artikel', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        try {
            $article->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
            ]);

            if ($request->hasFile('url')) {
                // Hapus gambar lama jika ada
                if ($article->image) {
                    $oldImagePath = public_path($article->image->url);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $article->image()->delete();
                }

                // Upload gambar baru
                $file = $request->file('url');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('articles'), $fileName);

                $article->image()->create([
                    'url' => 'articles/' . $fileName,
                    'jenis' => 'article',
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil diperbarui!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Gagal update artikel: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui artikel: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Article $article)
    {
        try {
            if ($article->image) {
                $imagePath = public_path($article->image->url);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $article->image()->delete();
            }

            $article->delete();

            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil dihapus!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Gagal hapus artikel: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus artikel: ' . $e->getMessage()
            ], 500);
        }
    }
}