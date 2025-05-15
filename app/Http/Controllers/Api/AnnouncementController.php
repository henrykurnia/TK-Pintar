<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\ParentModel;

class AnnouncementController extends Controller
{
    public function studentAnnouncements(Request $request)
    {
        $user = auth('api')->user();

        if (!$user || $user->role !== 'parent') {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized atau bukan orang tua',
            ], 403);
        }

        // Ambil student berdasarkan parent
        $parent = ParentModel::where('user_id', $user->id)->first();
        $student = Student::where('parent_id', $parent->id)->first();

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        $classId = $student->class_id;

        // Ambil pengumuman yang ada relasi ke class siswa
        $announcements = Announcement::whereHas('classes', function ($query) use ($classId) {
                $query->where('class_id', $classId);
            })
            ->orderBy('date', 'desc')
            ->get();

        $announcementsData = $announcements->map(function ($announcement) {
            return [
                'id' => $announcement->id,
                'title' => $announcement->title,
                'content' => $announcement->content,
                'date' => $announcement->date,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $announcementsData,
        ]);
    }

     // Endpoint untuk semua pengumuman (tanpa filter class)
     public function allAnnouncements(Request $request)
     {
         $user = auth('api')->user();
 
         if (!$user || $user->role !== 'teacher') {
             return response()->json([
                 'status' => 'error',
                 'message' => 'Unauthorized atau bukan teacher',
             ], 403);
         }
 
         // Ambil semua pengumuman tanpa filter class
         $announcements = Announcement::orderBy('date', 'desc')->get();
 
         $announcementsData = $announcements->map(function ($announcement) {
             return [
                 'id' => $announcement->id,
                 'title' => $announcement->title,
                 'content' => $announcement->content,
                 'date' => $announcement->date,
             ];
         });
 
         return response()->json([
             'status' => 'success',
             'data' => $announcementsData,
         ]);
     }
}
