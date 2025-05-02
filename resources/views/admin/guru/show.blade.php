<!-- resources/views/admin/guru/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Detail Guru | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">

      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">

        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Detail Guru</a>

        @include('admin.partial.user_info')

      </div>

      <div class="container mx-auto px-4 mt-6">
        <!-- Card Shadow Wrapper -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Teacher Info -->
            <div>
              <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Guru</h3>
              
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                  <p class="mt-1 text-sm text-gray-900">{{ $teacher->name }}</p>
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-500">NIP</label>
                  <p class="mt-1 text-sm text-gray-900">{{ $teacher->nip ?? '-' }}</p>
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</label>
                  <p class="mt-1 text-sm text-gray-900">{{ $teacher->ttl ?? '-' }}</p>
                </div>
              </div>
            </div>

            <!-- Contact Info -->
            <div>
              <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kontak</h3>
              
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-500">Alamat</label>
                  <p class="mt-1 text-sm text-gray-900">{{ $teacher->address ?? '-' }}</p>
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-500">Nomor Telepon</label>
                  <p class="mt-1 text-sm text-gray-900">{{ $teacher->phone_number ?? '-' }}</p>
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-500">Foto</label>
                  @if($teacher->user->photo)
                    <img src="{{ asset('storage/' . $teacher->user->photo) }}" class="mt-2 w-20 h-20 rounded-full" />
                  @else
                    <p class="mt-1 text-sm text-gray-900">-</p>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <div class="mt-6 flex justify-end">
            <a href="{{ route('guru.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
              Kembali
            </a>
          </div>
        </div>
      </div>
    </div>

    @include('admin.partial.script')
</body>

</html>