<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageUrlController extends Controller
{
    public function getArticleImages()
    {
        $images = DB::table('image_urls')
            ->join('article', 'image_urls.owner_id', '=', 'article.id')
            ->where('image_urls.jenis', 'article')
            ->orderByDesc('image_urls.created_at')
            ->limit(4)
            ->select(
                'image_urls.id',
                'image_urls.url',
                'article.title',
                'article.content'
            )
            ->get()
            ->map(function ($item) {
                // Ambil nama file dari database
                $fileName = $item->url;

                // Buat path ke file tanpa menggunakan 'public/' karena Laravel sudah menjadikan public sebagai root
                $fullUrl = url('assets/article/' . $fileName);

                return [
                    'id' => $item->id,
                    'url' => $fullUrl,
                    'title' => $item->title,
                    'content' => $item->content,
                ];
            });

        return response()->json([
            'status' => true,
            'data' => $images,
        ]);
    }


}
