<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ImageUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\OtpVerificationMail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Jobs\SendOtpJob;



class AuthController extends Controller
{
    public function registerParent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'name.required' => 'Nama siswa wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
                'statusCode' => 422
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'parent',
            ]);

            $parent = ParentModel::create([
                'user_id' => $user->id,
            ]);

            $student = Student::create([
                'parent_id' => $parent->id,
                'name' => $request->name,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'data' => [
                    'user' => $user,
                    'parent' => $parent,
                    'student' => $student,
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi',
                'error' => $e->getMessage(),
                'statusCode' => 500
            ], 500);
        }
    }

    public function registerTeacher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nip' => 'required|string|unique:teachers,nip',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah terdaftar.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
                'statusCode' => 422
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'teacher',
            ]);

            $teacher = Teacher::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'nip' => $request->nip,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'data' => [
                    'user' => $user,
                    'teacher' => $teacher,
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi',
                'error' => $e->getMessage(),
                'statusCode' => 500
            ], 500);
        }
    }

    public function checkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Format email tidak valid',
                'errors' => $validator->errors(),
                'statusCode' => 422
            ], 422);
        }

        try {
            $user = User::where('email', $request->email)->firstOrFail();

            $cacheKey = 'otp_' . $user->email;

            if (Cache::has($cacheKey)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode verifikasi sudah dikirim sebelumnya dan masih aktif.',
                    'data' => [
                        'email' => $this->maskEmail($user->email)
                    ],
                    'statusCode' => 409
                ], 409);
            }

            $otp = rand(100000, 999999);

            Cache::put($cacheKey, $otp, now()->addMinutes(10));

            // SendOtpJob::dispatch($user->email, [
            //     'otp' => $otp,
            //     'name' => $user->name,
            //     'username' => $user->name,
            // ]);

            Mail::to($user->email)->send(new OtpVerificationMail([
                'otp' => $otp,
                'email' => $user->email,
                'username' => $user->name
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Kode verifikasi telah dikirim ke email Anda',
                'data' => [
                    'email' => $this->maskEmail($user->email)
                ],
                'statusCode' => 200
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak terdaftar',
                'statusCode' => 404
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Email Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim kode verifikasi. Silakan coba lagi.',
                'statusCode' => 500
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $otpKey = 'otp_' . $request->email;
        $cachedOtp = Cache::get($otpKey);

        if (!$cachedOtp) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP sudah kedaluwarsa.',
                'statusCode' => 410
            ], 410);
        }

        if ($cachedOtp === 'used') {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP sudah pernah digunakan.',
                'statusCode' => 409
            ], 409);
        }

        if ($cachedOtp != $request->otp) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak cocok.',
                'errors' => ['otp' => ['Kode OTP tidak valid']],
                'statusCode' => 422
            ], 422);
        }

        // Set status OTP ke 'used' biar gak bisa dipakai lagi
        Cache::put($otpKey, 'used', now()->addMinutes(10));

        return response()->json([
            'success' => true,
            'message' => 'OTP valid.',
            'statusCode' => 200
        ]);
    }

    public function setNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email tidak ditemukan',
                    'statusCode' => 404,
                ], 404);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Kata sandi berhasil diperbarui',
                'statusCode' => 200,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengatur ulang kata sandi',
                'error' => $e->getMessage(),
                'statusCode' => 500,
            ], 500);
        }
    }

    private function maskEmail($email)
    {
        $parts = explode('@', $email);
        return substr($parts[0], 0, 1) . '***@' . $parts[1];
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Menyiapkan credentials untuk login
        $credentials = $request->only('email', 'password');

        // Mencoba login
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah',
            ]);
        }

        // Fungsi untuk mendapatkan URL gambar
        $getImageUrl = function ($imageName) {
            if (!$imageName)
                return null;

            $basePath = public_path();
            $possiblePaths = [
                'assets/student/' . $imageName,
                'assets/teacher/' . $imageName,
            ];

            foreach ($possiblePaths as $path) {
                if (file_exists($basePath . '/' . $path)) {
                    return asset($path);
                }
            }

            return null;
        };

        // Ambil user yang login
        $user = auth('api')->user();

        // Dapatkan waktu expiration dari token
        $expiration = auth('api')->payload()->get('exp');

        // Login untuk guru
        if ($user->role === 'teacher') {
            $teacher = Teacher::where('user_id', $user->id)->first();

            if (!$teacher) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data guru tidak ditemukan',
                ]);
            }

            $image = ImageUrl::where('owner_id', $teacher->id)
                ->where('owner_type', 'teacher')
                ->first();

            $imageUrl = $image ? $getImageUrl($image->url) : null;

            // Return untuk teacher (di Laravel)
            return response()->json([
                'status' => 'success',
                'data' => [
                    'role' => 'teacher',
                    'token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60, // detik
                    'expiration' => $expiration, // Tambahkan waktu expiration
                    'profile' => [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'teacher' => [
                            'id' => $teacher->id,
                            'name' => $teacher->name,
                            'nip' => $teacher->nip,
                            'ttl' => $teacher->ttl,
                            'about_me' => $teacher->about_me,
                            'address' => $teacher->address,
                            'phone_number' => $teacher->phone_number,
                            'image' => $imageUrl,
                        ]
                    ]
                ]
            ]);
        }
        // Login untuk orang tua
        elseif ($user->role === 'parent') {
            $parent = ParentModel::where('user_id', $user->id)->first();

            if (!$parent) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data orang tua tidak ditemukan',
                ]);
            }

            $student = Student::where('parent_id', $parent->id)->first();

            if (!$student) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data siswa tidak ditemukan',
                ]);
            }

            $image = ImageUrl::where('owner_id', $student->id)
                ->where('owner_type', 'student')
                ->first();

            $imageUrl = $image ? $getImageUrl($image->url) : null;

            return response()->json([
                'status' => 'success',
                'data' => [
                    'role' => 'parent',
                    'token' => $token,
                    'expiration' => $expiration, // Tambahkan waktu expiration
                    'profile' => [
                        'user_id' => $user->id,
                        'id' => $parent->id,
                        'name' => $parent->name,
                        'address' => $parent->address,
                        'phone_number' => $parent->phone_number,
                        'token_type' => 'bearer',
                        'expires_in' => auth('api')->factory()->getTTL() * 60, // detik
                        'student' => [
                            'id' => $student->id,
                            'class_id' => $student->class_id,
                            'name' => $student->name,
                            'gender' => $student->gender,
                            'ttl' => $student->ttl,
                            'religion' => $student->religion,
                            'image' => $imageUrl,
                        ]
                    ]
                ]
            ]);
        }

        // Jika role tidak valid
        return response()->json([
            'status' => 'error',
            'message' => 'Role pengguna tidak valid',
        ]);
    }

    public function refresh()
    {
        try {
            $newToken = auth('api')->refresh();
            $expiration = auth('api')->payload()->get('exp');

            return response()->json([
                'status' => 'success',
                'data' => [
                    'token' => $newToken,
                    'expiration' => $expiration
                ]
            ]);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token tidak valid'
            ], 401);
        }
    }

    public function checkToken()
    {
        try {
            $expiration = auth('api')->payload()->get('exp');

            return response()->json([
                'status' => 'success',
                'message' => 'Token valid',
                'expiration' => $expiration
            ]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token expired'
            ], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token tidak valid'
            ], 401);
        }
    }


    // AuthController.php
    public function logout()
    {
        try {
            auth('api')->logout();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil logout',
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal logout, token tidak valid',
            ], 500);
        }
    }


}