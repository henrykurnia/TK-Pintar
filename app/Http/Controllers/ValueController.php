<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('class');

        // Filter by class if requested
        if ($request->has('filter') && $request->filter != 'all') {
            $query->whereHas('class', function ($q) use ($request) {
                $q->where('name', $request->filter);
            });
        }

        $students = $query->orderBy('name')->get();

        return view('admin.hasilbelajar.index', compact('students'));
    }

    public function inputNilai($studentId)
    {
        $student = Student::with('class')->findOrFail($studentId);
        $courses = Course::all();
        $values = Value::where('student_id', $studentId)->get()->keyBy('course_id');

        return view('admin.hasilbelajar.inputnilai', compact('student', 'courses', 'values'));
    }

    public function simpanNilai(Request $request, $studentId)
    {
        $validated = $request->validate([
            'values.*' => 'nullable|numeric|min:0|max:100',
            'informations.*' => 'nullable|string|max:255'
        ]);

        foreach ($request->course_ids as $courseId) {
            Value::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_id' => $courseId
                ],
                [
                    'value' => $request->values[$courseId] ?? null,
                    'information' => $request->informations[$courseId] ?? null
                ]
            );
        }

        return redirect()->route('hasil-belajar.index')
            ->with('success');
    }
}
