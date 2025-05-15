<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::with(['user', 'classes'])
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('admin.pengumuman.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('admin.pengumuman.tambah_pengumuman', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id'
        ]);

        

        $announcement = Announcement::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'date' => $validated['date']
        ]);

        if (isset($validated['classes'])) {
            $announcement->classes()->sync($validated['classes']);
        }

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        $classes = Classes::all();
        return view('admin.pengumuman.edit_pengumuman', compact('announcement', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id'
        ]);

        $announcement->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'date' => $validated['date']
        ]);

        $announcement->classes()->sync($validated['classes'] ?? []);

        return redirect()->route('pengumuman.index')
            ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->classes()->detach();
        $announcement->delete();

        return redirect()->route('pengumuman.index')
            ->with('success');
    }
}