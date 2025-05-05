<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::latest()->get();
        return view('admin.dashboard', compact('heroSections'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Simpan gambar ke public/hero
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('hero'), $imageName);

        HeroSection::create([
            'image_path' => 'hero/' . $imageName
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Gambar hero berhasil diupload!');
    }

    public function destroy($id)
    {
        $heroSection = HeroSection::findOrFail($id);

        // Hapus file dari public/hero
        if (file_exists(public_path($heroSection->image_path))) {
            unlink(public_path($heroSection->image_path));
        }

        $heroSection->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Gambar hero berhasil dihapus!');
    }
}