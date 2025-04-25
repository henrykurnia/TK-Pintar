<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  @include('admin.partial.link')
  <title>Login</title>
  
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center"
      style="background-image: url('/img/bg-login.png');">
  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-[#229299] text-2xl font-bold mb-6 text-center">SELAMAT DATANG</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#229299]"
          value="{{ old('email') }}">
        @error('email')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
      </div>
    
      <!-- Password -->
      <div class="mb-2">
        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
        <input type="password" id="password" name="password" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#229299]">
        @error('password')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
      </div>

      <!-- Checkbox Show Password -->
      <div class="mb-4 flex items-center space-x-2">
        <input type="checkbox" id="showPassword" class="w-4 h-4 text-blue-600 border-gray-300 rounded" onchange="togglePassword()">
        <label for="showPassword" class="text-sm text-gray-700">Tampilkan Kata Sandi</label>
      </div>

      <!-- Lupa kata sandi -->
      <div class="mb-6 text-right">
        <a href="#" class="text-sm text-blue-500 hover:underline">Lupa Kata Sandi?</a>
      </div>

      <!-- Tombol Login -->
      <button type="submit"
              class="w-full bg-[#229299] text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
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
