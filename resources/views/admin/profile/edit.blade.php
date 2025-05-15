<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  <title>Edit Profile | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')

  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">

      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Edit Profile</a>
      
      </div>

      <div class="bg-white rounded-2xl max-w-4xl mx-auto p-8 mt-8 shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Informasi Pengguna</h2>

        @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

        @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
          <ul>
          @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
          </ul>
        </div>
    @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
          class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-4">
          @csrf
          @method('PUT')

        <div class="flex flex-col items-center justify-center space-y-4">
  @php
// Ambil foto profil terbaru
$profileImage = $user->imageUrls->where('jenis', 'teacher')->sortByDesc('created_at')->first();
$imageUrl = $profileImage ? asset($profileImage->url) . '?v=' . time() : asset('img/user.png');
  @endphp

  <div class="relative">
    <img id="profileImagePreview" src="{{ $imageUrl }}" alt="Foto Profil"
      class="w-28 h-28 rounded-full object-cover shadow" />
    <label for="url" class="absolute bottom-0 right-0 bg-[#0090D4] p-2 rounded-full cursor-pointer hover:bg-blue-600 transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
      </svg>
      <input type="file" id="url" name="url" accept="image/jpeg,image/png,image/jpg" class="hidden" />
    </label>
  </div>
  
  <span class="text-xs text-gray-500">Format: JPG, PNG (max 20MB)</span>
</div>

          <!-- Kanan: Formulir -->
          <div class="grid grid-cols-1 gap-6">
            <!-- Email -->
            <div>
              <label for="email" class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
              <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                required />
            </div>

            <!-- Password Baru -->
            <div>
              <label for="password" class="block text-gray-700 text-sm font-semibold mb-1">Password Baru (kosongkan jika tidak ingin
                mengubah)</label>
              <div class="relative">
                <input type="password" id="password" name="password"
                  class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10" />
                <button type="button" onclick="togglePassword('password')"
                  class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800">
                  <svg id="password-eye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <svg id="password-eye-slash" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                  </svg>
                </button>
              </div>
            </div>
            
            <!-- Konfirmasi Password -->
            <div>
              <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-1">Konfirmasi Password</label>
              <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation"
                  class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10" />
                <button type="button" onclick="togglePassword('password_confirmation')"
                  class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800">
                  <svg id="password_confirmation-eye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <svg id="password_confirmation-eye-slash" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                  </svg>
                </button>
              </div>
            </div>
            
            <script>
              function togglePassword(fieldId) {
                const field = document.getElementById(fieldId);
                const eyeIcon = document.getElementById(`${fieldId}-eye`);
                const eyeSlashIcon = document.getElementById(`${fieldId}-eye-slash`);

                if (field.type === 'password') {
                  field.type = 'text';
                  eyeIcon.classList.add('hidden');
                  eyeSlashIcon.classList.remove('hidden');
                } else {
                  field.type = 'password';
                  eyeIcon.classList.remove('hidden');
                  eyeSlashIcon.classList.add('hidden');
                }
              }
            </script>
            <div class="flex justify-end space-x-4">
              <a href="{{ route('admin.profile') }}"
                class="px-5 py-2 bg-gray-200 text-gray-700 text-sm border rounded-md hover:bg-gray-300 transition">
                Batal
              </a>
              <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white text-sm border rounded-md hover:bg-blue-700 transition">
                Simpan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('admin.partial.script')

  <script>
    document.getElementById('url').addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
          document.getElementById('profileImagePreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>

</html>