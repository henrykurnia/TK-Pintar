<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['class', 'parent'])->get();
        return view('admin.siswa.index', compact('students'));


        if ($request->has('filter') && $request->filter != 'all') {
            $query->whereHas('class', function ($q) use ($request) {
                $q->where('name', $request->filter);
            });
        }

        $students = $query->get();
        return view('admin.students.index', compact('students'));
    }

  

    /**
     * Show the form for editing class assignments.
     */
    public function editClass()
    {
        $students = Student::with('class')->get();
        $classes = Classes::all();
        return view('admin.siswa.aturkelas', compact('students', 'classes'));
    }

    /**
     * Update class assignments for multiple students.
     */
    public function updateClass(Request $request)
    {
        $validated = $request->validate([
            'students.*.id' => 'required|exists:students,id',
            'students.*.class_id' => 'nullable|exists:classes,id'
        ]);

        foreach ($request->students as $studentData) {
            $student = Student::find($studentData['id']);
            if ($student) {
                $student->update(['class_id' => $studentData['class_id']]);
            }
        }

        return redirect()->route('siswa.index')->with('success', 'Kelas siswa berhasil diperbarui');
    }
}