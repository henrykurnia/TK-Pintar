<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Data Guru dan Staff | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">

      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Data Guru dan Staff</a>

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
            <input type="text" placeholder="Cari guru/staff"
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
          </div>



          <!-- Tambah Siswa Button -->
          <div class="min-w-[120px] ml-auto">
            <a href="{{ url('/tambahguru') }}"
              class="bg-[#0090D4] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
              Tambah Wali Kelas
            </a>
          </div>

          <div class="min-w-[120px] ml-auto">
            <a href="{{ url('/tambahguru') }}"
              class="bg-[#0090D4] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
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
                <th class="name px-2 py-1">Nama</th>
                <th class="nip px-2 py-1">NIP</th>
                <th class="phone_number px-2 py-1">No.Telp</th>
                <th class="address px-2 py-1">Alamat</th>
                <th class="no_telp px-2 py-1">Jabatan</th>
                <th class="url px-2 py-1">Foto</th>
                <th class="aksi px-2 py-1">Pilihan</th>
              </tr>
            </thead>
            <tbody id="tbodyGuru" class="text-center">
              <!-- Data akan diubah oleh JS -->
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  @include('admin.partial.script')


</body>

</html>