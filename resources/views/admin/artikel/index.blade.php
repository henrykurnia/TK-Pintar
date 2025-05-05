<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('admin.partial.link')
  <title>Artikel | Admin TK Pintar</title>
  <!-- Tambahkan SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <!-- Hapus notifikasi session flash -->

        <!-- Search, Dropdown & Button -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
          <!-- Search Input -->
          <div class="relative flex-1 min-w-[150px]">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-[#0090D4]"></i>
            </span>
            <input type="text" placeholder="Cari artikel"
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
          </div>

          <!-- Tambah Artikel Button -->
          <div class="min-w-[120px] ml-auto">
            <a href="{{ route('articles.create') }}"
              class="bg-[#0090D4] hover:bg-[#007bb3] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
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
            <tbody class="text-center">
              @foreach($articles as $index => $article)
            <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="px-2 py-1">{{ $index + 1 }}</td>
            <td class="px-2 py-1">{{ $article->title }}</td>
            <td class="px-2 py-1">
  @if($article->image && $article->image->url)
    <div class="w-40 aspect-video mx-auto overflow-hidden rounded">
      <img src="{{ asset($article->image->url) }}" class="w-full h-full object-cover" alt="Gambar Artikel">
    </div>
  @else
    <span class="text-gray-400">Tidak ada gambar</span>
  @endif
</td>

            <td class="px-2 py-1">{{ Str::limit($article->content, 50) }}</td>
            <td class="px-2 py-1">{{ $article->created_at->format('d M Y') }}</td>
           <td class="px-2 py-1">
    <div class="flex justify-center gap-2">
        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-edit"></i>
        </a>
        <button onclick="deleteArticle({{ $article->id }})" class="text-red-600 hover:text-red-800">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</td>
            </tr>
        @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('admin.partial.script')

  <script>
    // Fungsi untuk menangani penghapusan artikel
   function deleteArticle(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Artikel yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.showLoading();

          // Gunakan route yang sesuai dengan definisi di web.php
          fetch(`/artikel/${id}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            }
          })
            .then(response => {
              if (!response.ok) {
                return response.json().then(err => { throw err; });
              }
              return response.json();
            })
            .then(data => {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                window.location.reload();
              });
            })
            .catch(error => {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: error.message || 'Terjadi kesalahan saat menghapus data'
              });
              console.error('Error:', error);
            });
        }
      });
    }
    // Menampilkan notifikasi dari session flash jika ada
    @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      showConfirmButton: false,
      timer: 1500
    });
  @endif

    @if(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Gagal!',
      text: "{{ session('error') }}"
    });
  @endif
  </script>
</body>

</html>