<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Tambah Artikel | Admin TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
       <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Tambah Artikel</a>

        @include('admin.partial.user_info')
        



      </div>

      <div class="container mx-auto px-4 mt-6">
  <!-- Card Shadow Wrapper -->
  <div class="bg-white p-6 rounded-lg shadow-md">

    <!-- Form -->
<form class="flex flex-col gap-4">
  
  <!-- Judul -->
  <div>
    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
    <input
      type="text"
      id="title"
      name="title"
      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
      placeholder="Masukkan Judul"
    />
  </div>

  <!-- Gambar -->
<div>
  <label for="gambar_artikel" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
  <input
    type="file"
    id="url"
    name="url"
    accept="image/*"
    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
    onchange="previewImage(event)"
  />

  <!-- Preview -->
  <div class="mt-3">
    <img id="preview" class="max-w-full h-auto rounded-lg shadow" style="display: none;" />
  </div>
</div>


  <!-- Deskripsi -->
<div>
  <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
  <textarea
    id="content"
    name="content"
    rows="6"
    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400 resize-none"
    placeholder="Masukkan deskripsi "
  ></textarea>
</div>


</form>


<div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">

  

  <!-- Button Batal dan Tambahkan (kanan) -->
  <div class="flex gap-2 w-full md:w-auto justify-end">
    <a
      href="{{ url('/artikel') }}"
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
       <!-- Script Preview -->
<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
       </body>
</html>