<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use App\Models\ImageUrl;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;
use App\Models\FcmToken;

class UserController extends Controller
{
    public function changePassword(Request $request)
    {
        // Ambil data user yang sedang login
        $user = auth('api')->user();

        // Validasi input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed', // password baru dan konfirmasi password baru
        ]);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            // Log error validasi
            Log::error('Validation errors:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422); // Menggunakan 422 untuk validasi gagal
        }

        // Cek apakah kata sandi lama yang dimasukkan benar
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi lama tidak benar.',
            ], 401); // 401 untuk Unauthorized
        }

        // Cek apakah password baru sama dengan password lama
        if (Hash::check($request->new_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi baru tidak boleh sama dengan kata sandi lama.',
            ], 400); // 400 untuk Bad Request
        }

        // Perbarui kata sandi dengan kata sandi baru
        $user->password = Hash::make($request->new_password);

        // Simpan perubahan kata sandi
        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Kata sandi berhasil diperbarui.',
            ], 200); // 200 untuk OK
        }

        // Jika terjadi kesalahan saat penyimpanan
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan dalam memperbarui kata sandi.',
        ], 500); // 500 untuk internal server error
    }


    private function getImageUrl($imageName)
    {
        if (!$imageName) return null;
    
        $basePath = public_path();
        $possiblePaths = [
            'assets/student/' . $imageName,
            'assets/teacher/' . $imageName,
        ];
    
        foreach ($possiblePaths as $path) {
            if (file_exists($basePath . '/' . $path)) {
                return asset($path);
            }
        }
    
        return null;
    }

    public function getUserById($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        $name = null;
        $profileImage = null;

        if ($user->role === 'parent') {
            $parent = ParentModel::where('user_id', $user->id)->first();
            $student = Student::where('parent_id', $parent->id)->first();
            if ($student) {
                $name = $student->name;
                $image = ImageUrl::where('owner_id', $student->id)->first();
                $profileImage = $image ? $this->getImageUrl($image->url) : null;
            }
        } elseif ($user->role === 'teacher') {
            $teacher = Teacher::where('user_id', $user->id)->first();
            if ($teacher) {
                $name = $teacher->name;
                $image = ImageUrl::where('owner_id', $teacher->id)->first();
                $profileImage = $image ? $this->getImageUrl($image->url) : null;
            }
        }

        if (!$name) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $name,
                'profile_image' => $profileImage
            ]
        ]);
    }

}
