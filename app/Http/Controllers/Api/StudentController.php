<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\ParentModel;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function updateProfile(Request $request)
{
    // Ambil data user yang sedang login
    $user = auth('api')->user();

    // Ambil data parent berdasarkan user_id
    $parent = ParentModel::where('user_id', $user->id)->first();

    if (!$parent) {
        return response()->json([
            'success' => false,
            'message' => 'Data orang tua tidak ditemukan.',
        ], 404);
    }

    // Ambil data student berdasarkan parent_id
    $student = Student::where('parent_id', $parent->id)->first();

    if (!$student) {
        return response()->json([
            'success' => false,
            'message' => 'Siswa tidak ditemukan untuk orang tua ini.',
        ], 404);
    }

    // Debug: Cek data yang masuk
Log::info('Request data:', $request->all());

    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'sometimes|required|string|max:100',
        'ttl' => 'sometimes|required|string|max:255',
        'gender' => 'sometimes|required|in:Laki-laki,Perempuan',
        'religion' => 'sometimes|required|string|max:50',
        'phone_number' => 'sometimes|required|string|max:20',
        'address' => 'sometimes|required|string|max:255',
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
    $studentSaved = false;
    if ($request->has('name') && $student->name != $request->name) {
        $student->name = $request->name;
    }
    if ($request->has('ttl')) {
        $student->ttl = $request->ttl;
    }
    if ($request->has('gender')) {
        $student->gender = $request->gender;
    }
    if ($request->has('religion')) {
        $student->religion = $request->religion;
    }

    // Simpan perubahan data orang tua jika ada perubahan
    $parentSaved = false;
    if ($request->has('phone_number') && $parent->phone_number != $request->phone_number) {
        $parent->phone_number = $request->phone_number;
    }
    if ($request->has('address') && $parent->address != $request->address) {
        $parent->address = $request->address;
    }

    // Cek jika perubahan berhasil
    if ($student->isDirty()) {
        $studentSaved = $student->save();
    }
    if ($parent->isDirty()) {
        $parentSaved = $parent->save();
    }

    if ($studentSaved || $parentSaved) {
        return response()->json([
            'success' => true,
            'message' => 'Profil siswa dan orang tua berhasil diperbarui.',
            'data' => [
                'student' => $student,
                'parent' => $parent,
            ]
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Terjadi kesalahan dalam memperbarui data.',
    ], 500);
}

public function MyStudents()
{
    $user = auth('api')->user();
    Log::debug('Guru Login:', ['user_id' => $user->id]);

    // Cari data guru yang login
    $teacher = DB::table('teachers')->where('user_id', $user->id)->first();

    if (!$teacher) {
        return response()->json([
            'success' => false,
            'message' => 'Data guru tidak ditemukan',
        ], 404);
    }

    Log::debug('Data Guru:', (array) $teacher);

    // Dapatkan class_id dari guru
    $class = DB::table('classes')->where('teacher_id', $teacher->id)->first();

    if (!$class) {
        return response()->json([
            'success' => false,
            'message' => 'Kelas tidak ditemukan untuk guru ini',
        ], 404);
    }

    Log::debug('Class ID:', ['class_id' => $class->id]);

    // Query untuk mendapatkan siswa dan orang tua di kelas tersebut
    DB::enableQueryLog();

    $studentsWithParents = DB::table('students')
        ->join('parents', 'parents.id', '=', 'students.parent_id')
        ->join('users', 'users.id', '=', 'parents.user_id')
        ->leftJoin('image_urls', function($join) {
            $join->on('image_urls.owner_id', '=', 'students.id')
                 ->where('image_urls.jenis', '=', 'student');
        })
        ->where('students.class_id', $class->id)
        ->select(
            'students.id as student_id',
            'students.name as student_name',
            'students.number as student_number',
            'parents.user_id as parent_userid',
            'parents.id as parent_id',
            'parents.name as parent_name',
            'parents.phone_number as parent_phone',
            'parents.address as parent_address',
            'users.email as parent_email',
            'image_urls.url as student_image'
        )
        ->get();

    Log::debug('SQL Query:', DB::getQueryLog());

    // Format data response
    $formattedData = $studentsWithParents->map(function ($item) {
        return [
            'student' => [
                'id' => $item->student_id,
                'name' => $item->student_name,
                'number' => $item->student_number,
                'image_url' => $item->student_image ? url('assets/student/' . $item->student_image) : null,
            ],
            'parent' => [
                'user_id' => $item->parent_userid,
                'id' => $item->parent_id,
                'name' => $item->parent_name,
                'phone_number' => $item->parent_phone,
                'address' => $item->parent_address,
                'email' => $item->parent_email,
                
            ]
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $formattedData,
        'class_info' => [
            'class_id' => $class->id,
            'class_name' => $class->name,
        ],
        'teacher_info' => [
            'teacher_id' => $teacher->id,
            'teacher_name' => $teacher->name,
        ]
    ]);
}
}