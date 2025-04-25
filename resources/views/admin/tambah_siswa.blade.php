<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Tambah Data Siswa | Admin TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Tambah Siswa</a>

        @include('admin.partial.user_info')
        



      </div>

      <div class="container mx-auto px-4 mt-6">
  <!-- Card Shadow Wrapper -->
  <div class="bg-white p-6 rounded-lg shadow-md">

    <!-- Header -->
    <h2 class="text-xl font-semibold text-[#229799] mb-4">Keterangan Siswa</h2>

    <!-- Form -->
    <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
      
      <!-- Nama Lengkap -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input
          type="text"
          id="name"
          name="name"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan nama lengkap"
        />
      </div>

      <!-- absen-->
      <div>
        <label for="absen" class="block text-sm font-medium text-gray-700 mb-1">No Absen</label>
        <input
          type="text"
          id="number"
          name="number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan No absen"
        />
      </div>

      <!-- Jenis Kelamin -->
      <div>
        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
        <select
          id="gender"
          name="gender"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
        >
          <option selected disabled>Pilih jenis kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <!-- Tempat Lahir -->
      <div>
        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Tanggal Lahir</label>
        <input
          type="text"
          id="ttl"
          name="ttl"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Contoh: Nganjuk, 10 Mei 2020"
        />
      </div>


      <!-- Alamat -->
      <div>
        <label for="alamat_siswa" class="block text-sm font-medium text-gray-700 mb-1">Alamat Tempat Tinggal</label>
        <input
          type="text"
          id="address"
          name="address"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
           placeholder="Alamat tempat tinggal saat ini"
        />
      </div>

      <!-- Agama -->
      <div>
        <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
        <input
          type="text"
          id="religion"
          name="religion"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
           placeholder="Masukkan Agama"
        />
      </div>


     
    </form>
  </div>
  <div class="container mx-auto px-4 mt-6">
  <!-- Card Shadow Wrapper -->
  <div class="bg-white p-6 rounded-lg shadow-md">

    <!-- Header -->
    <h2 class="text-xl font-semibold text-[#229799] mb-4">Keterangan Orang Tua</h2>
        
     <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
     
      
      <!-- Nama Lengkap -->
      <div>
        <label for="nama_ortu" class="block text-sm font-medium text-gray-900 mb-1">Nama Lengkap</label>
        <input
          type="text"
          id="name"
          name="name"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan nama lengkap"
        />
      </div>

       <!-- Tempat Lahir -->
      <div>
        <label for="tempat_lahir_ayah" class="block text-sm font-medium text-gray-700 mb-1">Tempat Tanggal Lahir</label>
        <input
          type="text"
          id="ttl"
          name="ttl"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Contoh: Nganjuk, 10 Mei 1997"
        />
      </div>

      
       <!-- Pendidikan Terakhir -->
      <div>
        <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Terakhir</label>
        <input
          type="text"
          id="education"
          name="education"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan pendidikan terakhir"
        />
      </div>

       <!-- Pekerjaan-->
      <div>
        <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
        <input
          type="text"
          id="work"
          name="work"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="kosongkan jika tidak bekerja/meninggal"
        />
      </div>


       <!-- No.telp Ayah -->
      <div>
        <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">No.Telp</label>
        <input
          type="text"
          id="phone_number"
          name="phone_number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan no.tlp aktif"
        />
      </div>
</form>



<div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">

  <!-- Dropdown Kelas (kiri) -->
  <div class="w-full md:w-auto">
    <select
      class="w-full md:w-48 py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400 text-sm"
    >
      <option selected disabled>Pilih Kelas</option>
      <option value="a1">Kelas A1</option>
      <option value="a2">Kelas A2</option>
      <option value="b1">Kelas B1</option>
      <option value="b2">Kelas B2</option>
    </select>
  </div>

  <!-- Button Batal dan Tambahkan (kanan) -->
  <div class="flex gap-2 w-full md:w-auto justify-end">
    <a
      href="{{ url('/siswa') }}"
      class="bg-red-600 hover:bg-red-700 text-white text text-sm font-medium py-2 px-4 rounded-lg shadow transition block text-center"
    >
      Batal
    </a>
    <button
      type="submit"
      class="bg-[#229799] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition block"
    >
      Tambahkan
    </button>
  </div>
</div>


</div>

</div>
</div>


       @include('admin.partial.script')
       </body>
</html>