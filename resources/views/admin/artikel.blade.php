<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Artikel | Admin TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Artikel</a>

        @include('admin.partial.user_info')
        



      </div>

      <div class="container mx-auto px-4 mt-6">

        <!-- Search, Dropdown & Button -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
          
          <!-- Search Input -->
          <div class="relative flex-1 min-w-[150px]">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-[#0090D4]"></i>
            </span>
            <input
              type="text"
              placeholder="Cari artikel"
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm"
            />
          </div>

        

          <!-- Tambah Siswa Button -->
          <div class="min-w-[120px] ml-auto">
            <a
              href="{{ url('/tambahartikel') }}"
              class="bg-[#0090D4] hover:bg-[#0090D4]-800 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center"
            >
              Tambah
            </a>
          </div>

        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-[#0090D4] text-white uppercase text-center">
              <tr>
                <th class="id px-2 py-1">No</th>
                <th class="title px-2 py-1">Judul</th>
                <th class="url px-2 py-1">Gambar</th>
                <th class="content px-2 py-1">Deskripsi</th>
                <th class="date px-2 py-1">Tanggal Pembuatan</th>
                <th class="aksi px-2 py-1">Pilihan</th>
                
              </tr>
            </thead>
            <tbody id="tbodyartikel" class="text-center">
             
            </tbody>[]
          </table>
        </div>

      </div>
    </div>
  </div>

  @include('admin.partial.script')

  
</body>
</html>
