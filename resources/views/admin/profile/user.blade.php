<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('admin.partial.link')
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  <title>Profile | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')

  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">

      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">Profile</h1>
        <div class="flex items-center justify-end space-x-4">
          @include('admin.partial.user_info')
        </div>
      </div>

      <div class="bg-white rounded-2xl max-w-4xl mx-auto p-8 mt-8 shadow-md">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-semibold text-gray-800">Informasi Pengguna</h2>
          <!-- Tombol Logout (Text + Icon merah) -->
          <form method="POST" action="{{ route('logout') }}" id="logoutForm">
            @csrf
            <button type="button" onclick="confirmLogout()"
              class="text-red-500 hover:text-red-700 transition-colors flex items-center">
              <i class="fas fa-sign-out-alt mr-2"></i>
              <span>Keluar</span>
            </button>
          </form>
        </div>

        @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

        <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-8">
          <!-- Kiri: Foto Profil -->
          <div class="flex flex-col items-center">
            @php
$profileImage = $user->imageUrls->where('jenis', 'teacher')->sortByDesc('created_at')->first();
$imageUrl = $profileImage ? asset($profileImage->url) . '?v=' . time() : asset('img/user.png');
        @endphp
            <div class="relative">
              <img src="{{ $imageUrl }}" alt="Foto Profil"
                class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-[#0090D4]" />
              <div class="absolute inset-0 rounded-full shadow-inner"></div>
            </div>
            <a href="{{ route('admin.profile.edit') }}"
              class="mt-6 px-6 py-2 bg-[#0090D4] text-white text-sm font-medium rounded-md hover:bg-blue-600 transition-colors shadow">
              Edit Profile
            </a>
          </div>

          <!-- Kanan: Informasi Pengguna -->
          <div class="space-y-6">
            <div class="space-y-1">
              <label class="block text-gray-600 text-sm font-medium">Email</label>
              <div class="px-4 py-3 bg-gray-50 rounded-md border border-gray-200">
                {{ $user->email }}
              </div>
            </div>

            <div class="space-y-1">
              <label class="block text-gray-600 text-sm font-medium">Jabatan</label>
              <div class="px-4 py-3 bg-gray-50 rounded-md border border-gray-200">
                {{ $user->role ?? 'Admin' }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.partial.script')

  <script>
    function confirmLogout() {
      Swal.fire({
        title: 'Konfirmasi Logout',
        text: "Apakah Anda yakin ingin keluar dari sistem?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Keluar',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logoutForm').submit();
        }
      });
    }
  </script>
</body>

</html>