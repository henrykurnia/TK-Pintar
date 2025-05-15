<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\ImageUrl;
use App\Models\Value;

class LearningOutcomeController extends Controller
{
    public function getLearningOutcome()
    {
        $user = auth('api')->user();

        // Ambil data orang tua
        $parent = DB::table('parents')->where('user_id', $user->id)->first();

        if (!$parent) {
            return response()->json([
                'success' => false,
                'message' => 'Data orang tua tidak ditemukan',
            ], 404);
        }

        // Ambil siswa berdasarkan parent_id
        $student = Student::where('parent_id', $parent->id)->first();

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        // Ambil informasi kelas dan guru
        $class = Classes::find($student->class_id);
        $teacher = $class ? Teacher::find($class->teacher_id) : null;

        // Ambil nilai dan course terkait
        $values = Value::with('course')
            ->where('student_id', $student->id)
            ->get()
            ->map(function ($value) {
                return [
                    'course' => $value->course->name ?? '-',
                    'value' => $value->value,
                    'information' => $value->information,
                ];
            });

             // Ambil gambar siswa
        $image = ImageUrl::where('owner_id', $student->id)
        ->where('owner_type', 'student')
        ->first();

    $imageUrl = $image ? $this->getImageUrl($image->url) : null;

        return response()->json([
            'success' => true,
            'data' => [
                'student' => [
                    'name' => $student->name,
                    'number' => $student->number,
                    'image_url' => $imageUrl,
                    'class' => [
                        'name' => $class->name ?? '-',
                        'teacher' => $teacher->name ?? '-',
                    ],
                ],
                'learning_outcomes' => $values,
            ]
        ]);
    }

    private function getImageUrl($url)
    {
        // Logika untuk mendapatkan URL gambar yang benar
        return asset('assets/student/' . $url); // Sesuaikan dengan lokasi penyimpanan gambar Anda
    }
}
