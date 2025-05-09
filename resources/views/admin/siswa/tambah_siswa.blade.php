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
    <form action="{{ route('siswa.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
      @csrf
    
      <!-- Student Information -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" id="name" name="name"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan nama lengkap" required />
      </div>
    
      <div>
        <label for="number" class="block text-sm font-medium text-gray-700 mb-1">No Absen</label>
        <input type="text" id="number" name="number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan No absen" />
      </div>
    
      <div>
        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
        <select id="gender" name="gender"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
          <option selected disabled>Pilih jenis kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    
      <div>
        <label for="ttl" class="block text-sm font-medium text-gray-700 mb-1">Tempat Tanggal Lahir</label>
        <input type="text" id="ttl" name="ttl"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Contoh: Nganjuk, 10 Mei 2020" />
      </div>
    
      <div>
        <label for="religion" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
        <input type="text" id="religion" name="religion"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan Agama" />
      </div>
    
      <!-- Parent Information -->
      <div>
        <label for="parent_name" class="block text-sm font-medium text-gray-900 mb-1">Nama Lengkap Orang Tua</label>
        <input type="text" id="parent_name" name="parent_name"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan nama lengkap" required />
      </div>
    
      <div>
        <label for="parent_ttl" class="block text-sm font-medium text-gray-700 mb-1">Tempat Tanggal Lahir Orang Tua</label>
        <input type="text" id="parent_ttl" name="parent_ttl"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Contoh: Nganjuk, 10 Mei 1997" />
      </div>
    
      <div>
        <label for="parent_education" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Terakhir</label>
        <input type="text" id="parent_education" name="parent_education"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan pendidikan terakhir" />
      </div>
    
      <div>
        <label for="parent_work" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
        <input type="text" id="parent_work" name="parent_work"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="kosongkan jika tidak bekerja/meninggal" />
      </div>
    
      <div>
        <label for="parent_phone_number" class="block text-sm font-medium text-gray-700 mb-1">No.Telp</label>
        <input type="text" id="parent_phone_number" name="parent_phone_number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan no.tlp aktif" />
      </div>
    
      <div>
        <label for="parent_address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
        <input type="text" id="parent_address" name="parent_address"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Alamat lengkap" />
      </div>
    
      <div class="md:col-span-3">
        <label for="class_id" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
        <select id="class_id" name="class_id"
          class="w-full md:w-48 py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400 text-sm"
          required>
          <option value="" disabled selected>Pilih Kelas</option>
          @foreach($classes as $class)
        <option value="{{ $class->id }}">{{ $class->name }}</option>
      @endforeach
        </select>
      </div>
    
      <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4 md:col-span-3">
        <div class="flex gap-2 w-full md:w-auto justify-end">
          <a href="{{ route('siswa.index') }}"
            class="bg-red-600 hover:bg-red-700 text-white text text-sm font-medium py-2 px-4 rounded-lg shadow transition block text-center">
            Batal
          </a>
          <button type="submit"
            class="bg-[#229799] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition block">
            Tambahkan
          </button>
        </div>
      </div>
    </form>


</div>

</div>
</div>


       @include('admin.partial.script')
       </body>
</html>