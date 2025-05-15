<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function getSchedule()
    {
        $user = auth('api')->user();
        $parent = DB::table('parents')->where('user_id', $user->id)->first();

        $student = Student::where('parent_id', $parent->id)->first();

        if (!$student) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        $classId = $student->class_id;

        $schedules = Schedule::whereHas('courseClass', function ($query) use ($classId) {
            $query->where('class_id', $classId);
        })->with(['courseClass.course.teacher'])->get();

        $result = [];

        // Definisikan urutan hari
        $urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Mengelompokkan dan mengurutkan jadwal berdasarkan hari
        foreach ($schedules as $schedule) {
            $hari = $schedule->hari;

            // Format jam
            $jamMulai = date('H:i', strtotime($schedule->jam_mulai));
            $jamSelesai = $schedule->jam_selesai;

            // Jika jam_selesai adalah 00:00:00, maka hanya tampilkan jam_mulai
            $jam = ($jamSelesai === '00:00:00') ? $jamMulai : $jamMulai . ' - ' . date('H:i', strtotime($jamSelesai));

            $kegiatan = $schedule->courseClass->course->name ?? '-';

            // Periksa apakah guru ada, jika tidak ada, set guru sebagai '-'
            $guru = $schedule->courseClass->course->teacher->name ?? '-';

            // Pastikan guru yang tidak ada tetap diisi dengan '-'
            if ($guru == 'null' || !$guru) {
                $guru = '-';
            }

            // Menambahkan jadwal ke dalam array hasil berdasarkan hari
            $result[$hari][] = [
                'Jam' => $jam,
                'Kegiatan' => $kegiatan,
                'Guru' => $guru
            ];
        }

        // Mengurutkan hari sesuai urutan yang diinginkan
        uksort($result, function($a, $b) use ($urutanHari) {
            return array_search($a, $urutanHari) - array_search($b, $urutanHari);
        });

        // Mengurutkan jadwal dalam setiap hari berdasarkan jam mulai
        foreach ($result as $hari => $jadwals) {
            usort($result[$hari], function($a, $b) {
                // Menggunakan strtotime untuk memastikan jam dan menit terurut dengan benar
                $jamA = explode(' - ', $a['Jam'])[0]; // Ambil jam mulai
                $jamB = explode(' - ', $b['Jam'])[0]; // Ambil jam mulai
                return strtotime($jamA) - strtotime($jamB);
            });
        }

        return response()->json(['success' => true, 'data' => $result]);
    }
}
