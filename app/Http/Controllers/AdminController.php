<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;

class AdminController extends Controller
{
   

  
    public function dashboard(Request $request)
    {
        
        // Cek login
        if (!auth()->check()) {
            return redirect('/login')->withHeaders([
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        

        // Ambil data hero images
        $heroImages = HeroSection::orderBy('created_at', 'asc')->get();


        return response()
            ->view('admin.dashboard', compact('heroImages'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
    public function uploadHero(Request $request)
    {
        // Cek jumlah gambar yang sudah ada
        $existingCount = HeroSection::count();

        // Jika sudah ada 4 gambar, tolak unggahan
        if ($existingCount >= 4) {
            return redirect()->back()->with('error', 'Maksimal 4 gambar diperbolehkan.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:102400',
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('hero');

        // Pindahkan file ke folder public/hero
        $file->move($destinationPath, $filename);

        // Simpan path relatif ke DB
        HeroSection::create([
            'image_path' => 'hero/' . $filename,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Foto berhasil diupload.');
    }



    public function deleteHero($id)
    {
        $image = HeroSection::findOrFail($id);

        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Foto berhasil dihapus.');
    }
}
