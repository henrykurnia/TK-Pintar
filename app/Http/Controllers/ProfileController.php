<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ImageUrl;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user()->load('imageUrls');
        return view('admin.profile.user', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user()->load('imageUrls');
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'url' => 'nullable|image|mimes:jpeg,png,jpg|max:20048',
        ]);

        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika ada file baru diupload, update foto
        if ($request->hasFile('url')) {
            $this->updateProfileImage($user, $request->file('url'));
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    private function updateProfileImage($user, $imageFile)
    {
        // 1. Cari foto profil lama (jenis 'teacher')
        $oldImage = $user->imageUrls()->where('jenis', 'teacher')->first();

        // 2. Hapus file fisik dan record database jika ada foto lama
        if ($oldImage) {
            $oldImagePath = public_path($oldImage->url);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
            $oldImage->delete();
        }

        // 3. Generate nama file unik
        $filename = 'profile_' . $user->id . '_' . time() . '.' . $imageFile->getClientOriginalExtension();

        // 4. Simpan file baru
        $imageFile->move(public_path('profile'), $filename);

        // 5. Simpan ke database
        $user->imageUrls()->create([
            'url' => 'profile/' . $filename,
            'jenis' => 'teacher',
        ]);
    }
}
