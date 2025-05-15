<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class SupportCenterController extends Controller
{
    
    public function help()
    {
        $user = auth()->user();
    
        $supportData = Support::select('name', 'wa_number')->get();
    
        $response = [
            'status' => true,
            'message' => 'Data support center berhasil diambil',
            'data' => $supportData,
        ];
    
        // Log data yang akan dikirim ke client (Flutter)
        Log::info('Response data ke Flutter (Support Center):', $response);
    
        return response()->json($response);
    }
    
}
