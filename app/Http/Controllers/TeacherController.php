<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Display semua teachers/staff
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.guru.index', compact('teachers'));
    }

    // menampilkan ditabel
    public function create()
    {
        return view('admin.guru.tambah_guru');
    }

    // proses tambah data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20',
            'ttl' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('teacher_photos'), $photoName);
                $validated['photo_path'] = 'teacher_photos/' . $photoName;
            }

            Teacher::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data guru/staff berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.guru.show', compact('teacher'));
    }

    // Menampilkan daftar guru/staff di halaman landing
    public function showOnLanding()
    {
        $teachers = Teacher::all();
        return view('landing.guru', compact('teachers'));
    }

    // show di edit
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.guru.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20',
            'ttl' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $teacher = Teacher::findOrFail($id);

            // upload foto baru
            if ($request->hasFile('photo')) {
                // Hapus foto lama dulu kalau ada
                if ($teacher->photo_path && file_exists(public_path($teacher->photo_path))) {
                    unlink(public_path($teacher->photo_path));
                }

                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('teacher_photos'), $photoName);

                $teacher->photo_path = 'teacher_photos/' . $photoName;
            }

            // Update data lainnya
            $teacher->name = $validated['name'];
            $teacher->nip = $validated['nip'] ?? null;
            $teacher->ttl = $validated['ttl'] ?? null;
            $teacher->address = $validated['address'] ?? null;
            $teacher->phone_number = $validated['phone_number'] ?? null;
            $teacher->position = $validated['position'] ?? null;

            $teacher->save();

            return response()->json([
                'success' => true,
                'message' => 'Data guru/staff berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data: ' . $e->getMessage()
            ], 500);
        }
    }

    //hapus
    public function destroy($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);

            // Hapus foto lama kalau ada
            if ($teacher->photo_path && file_exists(public_path($teacher->photo_path))) {
                unlink(public_path($teacher->photo_path));
            }

            $teacher->delete();

            return redirect()->route('guru.index')
                ->with('success', 'Data guru/staff berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->route('guru.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}