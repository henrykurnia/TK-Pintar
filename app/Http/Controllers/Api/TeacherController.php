<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{
    public function teacherstaff()
    {

        $user = auth('api')->user();
        Log::debug('User Login:', ['user_id' => $user->id]);
        Log::debug('Token dari request:', ['token' => request()->bearerToken()]);

        $parent = DB::table('parents')->where('user_id', $user->id)->first();

        if (!$parent) {
            return response()->json([
                'success' => false,
                'message' => 'Orang tua tidak ditemukan',
            ]);
        }
        // Mengambil seluruh data guru dan gambar terkait
        $teachers = DB::table('teachers')
            ->leftJoin('image_urls', 'image_urls.owner_id', '=', 'teachers.id')
            ->where(function ($query) {
                // Pastikan hanya gambar guru yang diambil atau tanpa gambar
                $query->where('image_urls.jenis', 'teacher')
                    ->orWhereNull('image_urls.url'); // Atau jika gambar tidak ada, tetap tampilkan guru
            })
            ->select(
                'teachers.user_id',
                'teachers.id',
                'teachers.name',
                'teachers.position',
                'image_urls.url'
            )
            ->get()
            ->map(function ($item) {
                // Jika URL gambar kosong atau tidak ada, gunakan gambar default
                $fileName = $item->url ?: '';  // Gunakan default jika tidak ada gambar
                $fullUrl = url('assets/teacher/' . $fileName); // Menambahkan base URL ke nama file gambar
    
                return [
                    'user_id' => $item->id,
                    'id' => $item->id,
                    'url' => $fullUrl, // Mengembalikan URL gambar lengkap atau default
                    'name' => $item->name, // Nama guru
                    'position' => $item->position, // Posisi guru
                ];
            });

        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'data' => $teachers, // Mengembalikan seluruh data guru dengan gambar yang terkait atau gambar default
        ]);
    }

    public function myTeacher()
    {
        $user = auth('api')->user();
        Log::debug('User Login:', ['user_id' => $user->id]);
        Log::debug('Token dari request:', ['token' => request()->bearerToken()]);

        $parent = DB::table('parents')->where('user_id', $user->id)->first();

        if (!$parent) {
            return response()->json([
                'success' => false,
                'message' => 'Orang tua tidak ditemukan',
            ]);
        }

        $student = DB::table('students')->where('parent_id', $parent->id)->first();

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Siswa tidak ditemukan untuk orang tua ini',
            ]);
        }

        Log::debug('Class ID siswa:', ['class_id' => $student->class_id]);

        DB::enableQueryLog();

        $myTeacher = DB::table('teachers')
            ->join('classes', 'classes.teacher_id', '=', 'teachers.id')
            ->leftJoin('image_urls', 'image_urls.owner_id', '=', 'teachers.id')
            ->where('classes.id', $student->class_id)
            ->where(function ($query) {
                $query->where('image_urls.jenis', 'teacher')
                    ->orWhereNull('image_urls.url');
            })
            ->select(
                'teachers.user_id',
                'teachers.id',
                'teachers.name',
                'teachers.position',
                'image_urls.url'
            )
            ->first();

        Log::debug('SQL Query:', DB::getQueryLog());
        Log::debug('Data Wali Kelas:', (array) $myTeacher);

        if (!$myTeacher) {
            return response()->json([
                'success' => false,
                'message' => 'Wali kelas tidak ditemukan untuk kelas ini',
            ]);
        }

        $fileName = $myTeacher->url ?: '';
        $fullUrl = $fileName ? url('assets/teacher/' . $fileName) : '';


        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $myTeacher->user_id,
                'id' => $myTeacher->id,
                'name' => $myTeacher->name,
                'position' => $myTeacher->position,
                'url' => $fullUrl,
            ],
        ]);
    }

    public function getDetailTeacher($id)
    {
        $teacher = DB::table('teachers')
            ->leftJoin('image_urls', 'image_urls.owner_id', '=', 'teachers.id')
            ->where('teachers.id', $id)
            ->where(function ($query) {
                $query->where('image_urls.jenis', 'teacher')
                    ->orWhereNull('image_urls.url');
            })
            ->select(
                'teachers.name',
                'teachers.nip',
                'teachers.ttl',
                'teachers.address',
                'teachers.phone_number',
                'teachers.position',
                'teachers.about_me',
                'image_urls.url'
            )
            ->first();

        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Data guru tidak ditemukan',
            ]);
        }

        $fileName = $teacher->url ?: '';
        $fullUrl = $fileName ? url('assets/teacher/' . $fileName) : '';

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $teacher->name,
                'nip' => $teacher->nip,
                'ttl' => $teacher->ttl,
                'address' => $teacher->address,
                'phone_number' => $teacher->phone_number,
                'position' => $teacher->position,
                'about_me' => $teacher->about_me,
                'url' => $fullUrl,
            ],
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Ambil data user yang sedang login
        $user = auth('api')->user();

        // Ambil data parent berdasarkan user_id
        $teacher = Teacher::where('user_id', $user->id)->first();

        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.',
            ], 404);
        }
        // Debug: Cek data yang masuk
        Log::info('Request data:', $request->all());

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100',
            'ttl' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string|max:255',
            'nip' => 'sometimes|required|string|max:20',
            'about_me' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            // Log error validasi
            Log::error('Validation errors:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }


        // Simpan perubahan data siswa jika ada perubahan
        $teacherSaved = false;
        if ($request->has('name') && $teacher->name != $request->name) {
            $teacher->name = $request->name;
        }
        if ($request->has('ttl')) {
            $teacher->ttl = $request->ttl;
        }
        if ($request->has('address')) {
            $teacher->address = $request->address;
        }
        if ($request->has('nip')) {
            $teacher->nip = $request->nip;
        }
        if ($request->has('about_me')) {
            $teacher->about_me = $request->about_me;
        }
        if ($request->has('phone_number')) {
            $teacher->phone_number = $request->phone_number;
        }

        // Cek jika perubahan berhasil
        if ($teacher->isDirty()) {
            $teacherSaved = $teacher->save();
        }

        if ($teacherSaved) {
            return response()->json([
                'success' => true,
                'message' => 'Profil guru berhasil diperbarui.',
                'data' => [
                    'student' => $teacher,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan dalam memperbarui data.',
        ], 500);
    }


}