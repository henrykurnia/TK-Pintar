<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  @include('admin.partial.link')
  <title>Tambah Artikel | Admin TK Pintar</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
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
          <form id="articleForm" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data"
            class="flex flex-col gap-4">
            @csrf

            <!-- Judul -->
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
              <input type="text" id="title" name="title"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Masukkan Judul" required />
            </div>

            <!-- Gambar -->
            <div>
              <label for="url" class="block text-sm font-medium text-gray-700 mb-1">Gambar Artikel</label>
              <input type="file" id="url" name="url" accept="image/jpeg,image/png,image/jpg,image/gif"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
                onchange="previewImage(event)" required />

              <!-- Preview Gambar -->
              <div class="mt-3">
                <img id="preview" class="max-w-full h-48 object-contain rounded-lg shadow" style="display: none;"
                  alt="Preview Gambar Artikel" />
                <p id="no-preview" class="text-sm text-gray-500">Tidak ada gambar yang dipilih</p>
              </div>
            </div>

            <!-- Deskripsi -->
            <div>
              <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
              <textarea id="content" name="content" rows="6"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400 resize-none"
                placeholder="Masukkan deskripsi" required></textarea>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">
              <div class="flex gap-2 w-full md:w-auto justify-end">
                <a href="{{ route('articles.index') }}"
                  class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition block text-center">
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
  </div>

  @include('admin.partial.script')

  <!-- Script Preview Gambar -->
  <script>
    function previewImage(event) {
      const preview = document.getElementById('preview');
      const noPreview = document.getElementById('no-preview');
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
          noPreview.style.display = 'none';
        };
        reader.readAsDataURL(file);
      } else {
        preview.style.display = 'none';
        noPreview.style.display = 'block';
      }
    }
  </script>

  <!-- SweetAlert untuk notifikasi dengan fetch API -->
  <script>
    document.getElementById('articleForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        // Tampilkan loading indicator
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        submitButton.innerHTML = 'Menyimpan...';
        submitButton.disabled = true;

        fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json', // Tambahkan header ini
          },
          // Tambahkan redirect: 'manual' untuk menangani redirect dari server
          redirect: 'manual'
        })
          .then(response => {
            // Jika response redirect (status 302)
            if (response.redirected) {
              window.location.href = response.url;
              return;
            }
            return response.json();
          })
          .then(data => {
            if (data && data.success) {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                window.location.href = "{{ route('articles.index') }}";
              });
            } else if (data) {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: data.message
              });
            }
          })
          .catch(error => {
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Terjadi kesalahan saat menyimpan data'
            });
          })
          .finally(() => {
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
          });
      });
  </script>

</body>

</html>