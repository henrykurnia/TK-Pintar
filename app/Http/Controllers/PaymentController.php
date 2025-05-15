<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with(['class', 'payments']);

        // Filter by class if requested
        if ($request->has('filter') && $request->filter != 'all') {
            $query->whereHas('class', function ($q) use ($request) {
                $q->where('name', $request->filter);
            });
        }

        $students = $query->orderBy('name')->get();

        return view('admin.pembayaran.index', [
            'students' => $students,
            'filter' => $request->filter ?? 'all'
        ]);
    }

    public function create(Student $student)
    {
        $months = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $currentYear = date('Y');
        $years = range($currentYear - 1, $currentYear + 1);

        return view('admin.pembayaran.input', compact('student', 'months', 'years'));
    }

    public function store(Request $request, Student $student)
    {
        $validated = $request->validate([
            'month' => 'required|string',
            'year' => 'required|numeric',
            'status' => 'required|in:lunas,belum lunas',
            'date' => 'nullable|date'
        ]);

        Payment::updateOrCreate(
            [
                'student_id' => $student->id,
                'month' => $request->month,
                'year' => $request->year
            ],
            [
                'status' => $request->status,
                'date' => $request->date
            ]
        );

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil disimpan');
    }
}