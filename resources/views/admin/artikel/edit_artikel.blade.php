<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('admin.partial.link')
  <title>Edit Artikel | Admin TK Pintar</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">

      <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Edit Artikel</a>
        @include('admin.partial.user_info')
      </div>

      <div class="container mx-auto px-4 mt-6">
        <!-- Card Shadow Wrapper -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <!-- Form -->
          <form id="articleForm" method="POST" action="{{ route('articles.update', $article->id) }}"
            enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
              <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
              <input type="text" id="title" name="title" value="{{ $article->title }}"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
                placeholder="Masukkan Judul" required />
            </div>

            <!-- Gambar -->
            <div>
    <label for="url" class="block text-sm font-medium text-gray-700 mb-1">Gambar Artikel</label>
    <input
        type="file"
        id="url"
        name="url"
        accept="image/jpeg,image/png,image/jpg,image/gif"
        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"
        onchange="previewImage(event)"
        @if(!isset($article)) required @endif
    />
    
    <!-- Preview Gambar -->
    <div class="mt-3">
        @if(isset($article) && $article->image)
            <img id="preview" src="{{ asset($article->image->url) }}" class="max-w-full h-48 object-contain rounded-lg shadow" alt="Preview Gambar Artikel"/>
        @else
            <img id="preview" class="max-w-full h-48 object-contain rounded-lg shadow" style="display: none;" alt="Preview Gambar Artikel"/>
        @endif
        <p id="no-preview" class="text-sm text-gray-500" @if(isset($article) && $article->image) style="display: none;" @endif>Tidak ada gambar yang dipilih</p>
    </div>
</div>
            </div>

            <!-- Deskripsi -->
            <div>
              <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
              <textarea id="content" name="content" rows="6"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400 resize-none"
                placeholder="Masukkan deskripsi" required>{{ $article->content }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-4">
              <!-- Button Batal dan Tambahkan (kanan) -->
              <div class="flex gap-2 w-full md:w-auto justify-end">
                <a href="{{ route('articles.index') }}"
                  class="bg-red-600 hover:bg-red-700 text-white text text-sm font-medium py-2 px-4 rounded-lg shadow transition block text-center">
                  Batal
                </a>
                <button type="submit"
                  class="bg-[#229799] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition block">
                  Simpan Perubahan
                </button>
              </div>
            </div>
          </form>
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
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    document.getElementById('articleForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent default form submission

      const form = e.target;
      const formData = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'X-HTTP-Method-Override': 'PUT'
        }
      })
        .then(response => {
          if (response.redirected) {
            window.location.href = response.url;
          } else {
            return response.json();
          }
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
          }
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat menyimpan data'
          });
        });
    });
  </script>
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
        }

        reader.readAsDataURL(file);
      } else {
        preview.style.display = 'none';
        noPreview.style.display = 'block';
      }
    }
  </script>
</body>

</html>