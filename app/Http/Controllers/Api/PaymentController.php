<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Classes;
use App\Models\ImageUrl;  // Tambahkan import untuk model ImageUrl
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function getPayment()
    {
        $user = auth('api')->user();

        // Ambil data orang tua berdasarkan user yang login
        $parent = DB::table('parents')->where('user_id', $user->id)->first();

        // Ambil data siswa berdasarkan parent_id
        $student = Student::where('parent_id', $parent->id)->first();

        if (!$student) {
            return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
        }

        // Ambil class_id dan nama kelas dari siswa
        $classId = $student->class_id;
        $class = Classes::find($classId);
        $className = $class->name ?? '-';
        $studentNumber = $student->number ?? '-';

        // Ambil data pembayaran dari tabel payments berdasarkan student_id
        $payments = Payment::where('student_id', $student->id)
            ->orderBy('year', 'desc') // Urutkan berdasarkan tahun terbaru
            ->orderBy('month', 'desc') // Urutkan berdasarkan bulan terbaru
            ->get();

        // Siapkan data untuk dikirim ke frontend
        $paymentData = [];

        foreach ($payments as $payment) {
            // Tentukan status pembayaran
            $status = ($payment->date) ? 'Lunas' : 'Belum Lunas';

            // Formatkan tanggal menjadi format yang diinginkan (tanggal-bulan-tahun)
            $formattedDate = $payment->date ? Carbon::parse($payment->date)->format('d-m-Y') : null;

            // Tambahkan data pembayaran
            $paymentData[] = [
                'month' => $payment->month,
                'year' => $payment->year ?? date('Y'), // default ke tahun sekarang kalau null
                'status' => $status,
                'date' => $payment->date ? date('d-m-Y', strtotime($payment->date)) : null, // Format Tanggal-Bulan-Tahun
            ];
            
        }

        // Ambil gambar siswa
        $image = ImageUrl::where('owner_id', $student->id)
            ->where('owner_type', 'student')
            ->first();

        $imageUrl = $image ? $this->getImageUrl($image->url) : null;

        // Kirimkan data sebagai respon
        return response()->json([
            'success' => true,
            'student' => [
                'name' => $student->name,
                'class_name' => $className,
                'number' => $studentNumber,
                'image_url' => $imageUrl, // Sertakan URL gambar siswa
            ],
            'payments' => $paymentData,
        ]);
    }

    // Fungsi untuk mendapatkan URL gambar
    private function getImageUrl($url)
    {
        // Logika untuk mendapatkan URL gambar yang benar
        return asset('assets/student/' . $url); // Sesuaikan dengan lokasi penyimpanan gambar Anda
    }
}
