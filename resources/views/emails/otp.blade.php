<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo {
            color: #1E88E5;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .otp-container {
            background: #f0f7ff;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }

        .otp-code {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 5px;
            color: #1E88E5;
            margin: 15px 0;
        }

        .note {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">TK PINTAR</div>
            <h2>Verifikasi Email Anda</h2>
        </div>

        <p>Halo <strong>{{ $data['username'] }}</strong>,</p>

        <p>Berikut adalah kode verifikasi untuk akun TK Pintar Anda:</p>

        <div class="otp-container">
            <div class="otp-code">{{ $data['otp'] }}</div>
            <p class="note">Gunakan kode ini untuk melanjutkan proses verifikasi</p>
        </div>

        <p>Kode ini akan kadaluarsa dalam <strong>10 menit</strong>.</p>

        <div class="footer">
            <p>Email ini ditujukan untuk {{ $data['email'] }}</p>
            <p>© {{ date('Y') }} TK Pintar. Nganjuk, Jawa Timur</p>
        </div>
    </div>
</body>

</html>