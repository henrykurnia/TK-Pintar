<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Parents;
use App\Models\Classes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query()->with(['class', 'parent']);

        // Search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('number', 'like', "%{$search}%")
                ->orWhereHas('parent', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        // Class filter
        if ($request->has('class')) {
            $query->where('class_id', $request->input('class'));
        }

        $students = $query->orderBy('number')->paginate(10);
        $classes = Classes::all();

        return view('admin.siswa.index', compact('students', 'classes'));
    }
    public function create()
    {
        $classes = Classes::all();
        return view('admin.siswa.tambah_siswa', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'ttl' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:50',
            'parent_name' => 'required|string|max:255',
            'parent_ttl' => 'nullable|string|max:255',
            'parent_education' => 'nullable|string|max:100',
            'parent_work' => 'nullable|string|max:100',
            'parent_phone_number' => 'nullable|string|max:20',
            'parent_address' => 'nullable|string',
            'class_id' => 'required|in:A1,A2,B1,B2'
        ]);

        // Create parent first
        $parent = Parents::create([
            'name' => $validated['parent_name'],
            'education' => $validated['parent_education'],
            'work' => $validated['parent_work'],
            'phone_number' => $validated['parent_phone_number'],
            'address' => $validated['parent_address'],
            'user_id' => auth()->id() // assuming parent is linked to the current user
        ]);

        // Then create student
        $student = Student::create([
            'parent_id' => $parent->id,
            'class_id' => $validated['class_id'],
            'name' => $validated['name'],
            'number' => $validated['number'],
            'gender' => $validated['gender'],
            'ttl' => $validated['ttl'],
            'religion' => $validated['religion']
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('siswa.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = Classes::all();
        return view('siswa.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'ttl' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:50',
            'parent_name' => 'required|string|max:255',
            'parent_ttl' => 'nullable|string|max:255',
            'parent_education' => 'nullable|string|max:100',
            'parent_work' => 'nullable|string|max:100',
            'parent_phone_number' => 'nullable|string|max:20',
            'parent_address' => 'nullable|string',
            'class_id' => 'nullable|exists:classes,id'
        ]);

        // Update parent
        $student->parent->update([
            'name' => $validated['parent_name'],
            'education' => $validated['parent_education'],
            'work' => $validated['parent_work'],
            'phone_number' => $validated['parent_phone_number'],
            'address' => $validated['parent_address']
        ]);

        // Update student
        $student->update([
            'class_id' => $validated['class_id'],
            'name' => $validated['name'],
            'number' => $validated['number'],
            'gender' => $validated['gender'],
            'ttl' => $validated['ttl'],
            'religion' => $validated['religion']
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        $student->parent->delete(); // This will also delete the student due to cascade
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}