<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  @include('admin.partial.link')
  <title>Artikel | Admin TK Pintar</title>
  <!-- Tambahkan SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @media (max-width: 768px) {
      .mobile-card {
        display: block;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1rem;
        background: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }
      
      .mobile-card-header {
        font-weight: bold;
        color: #2d3748;
        margin-bottom: 0.5rem;
      }
      
      .mobile-card-content {
        margin-bottom: 0.5rem;
      }
      
      .mobile-card-image {
        width: 100%;
        height: auto;
        border-radius: 0.25rem;
        margin-bottom: 0.5rem;
      }
      
      .mobile-card-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
      }
      
      /* Hide desktop table on mobile */
      .desktop-table {
        display: none;
      }
    }
    
    @media (min-width: 769px) {
      /* Hide mobile cards on desktop */
      .mobile-cards {
        display: none;
      }
    }
  </style>
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
          

          <!-- Tambah Artikel Button -->
          <div class="min-w-[120px] ml-auto">
            <a href="{{ route('articles.create') }}"
              class="bg-[#0090D4] hover:bg-[#007bb3] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
              Tambah
            </a>
          </div>
        </div>

        <!-- Desktop Table (hidden on mobile) -->
        <div class="desktop-table">
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

        <!-- Mobile Cards (hidden on desktop) -->
        <div class="mobile-cards">
          @foreach($articles as $index => $article)
          <div class="mobile-card">
            <div class="mobile-card-header">No: {{ $index + 1 }}</div>
            <div class="mobile-card-header">Judul: {{ $article->title }}</div>
            
            <div class="mobile-card-content">
              @if($article->image && $article->image->url)
              <img src="{{ asset($article->image->url) }}" class="mobile-card-image" alt="Gambar Artikel">
              @else
              <span class="text-gray-400">Tidak ada gambar</span>
              @endif
            </div>
            
            <div class="mobile-card-content">
              <span class="font-semibold">Deskripsi:</span> {{ Str::limit($article->content, 50) }}
            </div>
            
            <div class="mobile-card-content">
              <span class="font-semibold">Tanggal:</span> {{ $article->created_at->format('d M Y') }}
            </div>
            
            <div class="mobile-card-actions">
              <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-edit"></i> Edit
              </a>
              <button onclick="deleteArticle({{ $article->id }})" class="text-red-600 hover:text-red-800">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>
          @endforeach
          
          @if($articles->isEmpty())
          <div class="mobile-card text-center text-gray-400">
            Belum ada artikel
          </div>
          @endif
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