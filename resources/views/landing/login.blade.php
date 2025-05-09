<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  @include('admin.partial.link')
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  <title>Login | TK Pertiwi Grojogan</title>
  <style>
    @media (max-width: 640px) {
      body {
        padding: 20px;
        background-position: center;
      }

      .login-container {
        padding: 1.5rem;
        margin-top: 2rem;
      }
    }
  </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center"
  style="background-image: url('/img/bg-login1.png'); position: relative;">

  <!-- Back Button - Made smaller for mobile -->
  <a href="{{ url('/?_fragment=hero') }}"
    class="absolute top-4 left-4 bg-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center shadow-md hover:bg-gray-100 hover:-translate-x-0.5 transition-all duration-200">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
      stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
  </a>

  <!-- Login Container - Adjusted padding and width for mobile -->
  <div
    class="bg-white p-6 md:p-8 rounded-xl md:rounded-2xl shadow-md w-full max-w-xs sm:max-w-sm md:max-w-md mx-4 relative login-container">
    <h2 class="text-[#0090D4] text-xl md:text-2xl font-bold mb-4 md:mb-6 text-center">SELAMAT DATANG</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <!-- Email - Adjusted spacing and input size -->
      <div class="mb-3 md:mb-4">
        <label for="email" class="block text-xs md:text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
          class="mt-1 w-full px-3 py-2 md:px-4 md:py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0090D4]"
          value="{{ old('email') }}">
        @error('email')
      <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
    @enderror
      </div>

      <!-- Password - Adjusted spacing and input size -->
      <div class="mb-2 md:mb-3">
        <label for="password" class="block text-xs md:text-sm font-medium text-gray-700">Kata Sandi</label>
        <input type="password" id="password" name="password" required
          class="mt-1 w-full px-3 py-2 md:px-4 md:py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0090D4]">
        @error('password')
      <span class="text-red-500 text-xs md:text-sm">{{ $message }}</span>
    @enderror
      </div>

      <!-- Checkbox Show Password - Smaller for mobile -->
      <div class="mb-3 md:mb-4 flex items-center space-x-2">
        <input type="checkbox" id="showPassword" class="w-3.5 h-3.5 md:w-4 md:h-4 text-blue-600 border-gray-300 rounded"
          onchange="togglePassword()">
        <label for="showPassword" class="text-xs md:text-sm text-gray-700">Tampilkan Kata Sandi</label>
      </div>

      <!-- Lupa kata sandi - Smaller text -->
      <div class="mb-4 md:mb-6 text-right">
        <a href="#" class="text-xs md:text-sm text-blue-500 hover:underline">Lupa Kata Sandi?</a>
      </div>

      <!-- Tombol Login - Adjusted padding -->
      <button type="submit"
        class="w-full bg-[#0090D4] text-white py-2 px-4 text-sm md:text-base rounded-lg hover:bg-blue-700 transition">
        Masuk
      </button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const checkbox = document.getElementById('showPassword');
      passwordInput.type = checkbox.checked ? 'text' : 'password';
    }
  </script>
</body>

</html>