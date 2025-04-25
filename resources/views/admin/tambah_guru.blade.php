<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Tambah Data Guru dan Staff | Admin TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
       <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Tambah  Guru</a>

        @include('admin.partial.user_info')
        



      </div>

      <div class="container mx-auto px-4 mt-6">
  <!-- Card Shadow Wrapper -->
  <div class="bg-white p-6 rounded-lg shadow-md">

    <!-- Form -->
    <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
      
      <!-- Nama Lengkap -->
      <div>
        <label for="nama_guru" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input
          type="text"
          id="name"
          name="name"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan nama lengkap"
        />
      </div>

      <!-- NIP -->
      <div>
        <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
        <input
          type="text"
          id="nip"
          name="nip"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan NIP"
        />
      </div>

      <!-- Tempat Lahir -->
      <div>
        <label for="tempat_lahir_guru" class="block text-sm font-medium text-gray-700 mb-1">Tempat Tanggal Lahir</label>
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
        <label for="alamat_guru" class="block text-sm font-medium text-gray-700 mb-1">Alamat Tempat Tinggal</label>
        <input
          type="text"
          id="address"
          name="address"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
           placeholder="Alamat tempat tinggal saat ini"
        />
      </div>

      <!-- No.Telp -->
      <div>
        <label for="no_telp_guru" class="block text-sm font-medium text-gray-700 mb-1">No.Telp</label>
        <input
          type="text"
          id="phone_number"
          name="phone_number"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
          placeholder="Masukkan no.telp"
        />
      </div>

      

      <!-- Foto -->
      <div>
  <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
  <input
    type="file"
    id="url"
    name="url"
    accept="image/*"
    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
    onchange="previewFoto(event)"
  />

  <!-- Preview -->
  <div class="mt-3">
    <img
      id="previewFoto"
      class="rounded-lg shadow"
      style="display: none; max-width: 200px; height: auto;"
    />
  </div>
</div>


     
</form>

<div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">

  

  <!-- Button Batal dan Tambahkan (kanan) -->
  <div class="flex gap-2 w-full md:w-auto justify-end">
    <a
      href="{{ url('/guru') }}"
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

 <script>
  function previewFoto(event) {
    const input = event.target;
    const preview = document.getElementById('previewFoto');

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

       </body>
</html>