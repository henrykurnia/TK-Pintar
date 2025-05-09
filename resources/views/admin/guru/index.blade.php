<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  <title>Data Guru dan Staff | Admin TK Pintar</title>
  <!-- Add SweetAlert2 for beautiful alerts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    @media (max-width: 768px) {
      /* Hide table headers */
      .table-header-group {
        display: none;
      }
      
      /* Make table cells stack vertically */
      .mobile-stack td {
        display: block;
        text-align: right;
        padding: 0.5rem;
        border-bottom: 1px solid #e5e7eb;
      }
      
      /* Add pseudo-element for column names */
      .mobile-stack td:before {
        content: attr(data-label);
        float: left;
        font-weight: bold;
        color: #374151;
      }
      
      /* Last child border */
      .mobile-stack tr:last-child td {
        border-bottom: 2px solid #e5e7eb;
      }
      
      /* Action buttons center */
      .mobile-stack td[data-label="Pilihan"] {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
      }
      
      /* Reduce padding on container */
      .container {
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      /* Adjust search and button layout */
      .flex-wrap {
        flex-direction: column;
        gap: 0.5rem;
      }
      
      .min-w-\[150px\] {
        min-width: 100%;
      }
      
      .ml-auto {
        margin-left: 0;
        width: 100%;
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
            <input type="text" id="searchInput" placeholder="Cari berdasarkan nama..."
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
          </div>

          <!-- Tambah Siswa Button -->
          <div class="min-w-[120px] ml-auto">
            <a href="{{ route('guru.create') }}"
              class="bg-[#0090D4] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
              Tambah
            </a>
          </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-[#0090D4] text-white uppercase text-center table-header-group">
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
              @foreach($teachers as $index => $teacher)
              <tr class="border-b hover:bg-gray-50 mobile-stack" data-name="{{ strtolower($teacher->name) }}">
                <td class="px-2 py-1" data-label="No">{{ $index + 1 }}</td>
                <td class="px-2 py-1" data-label="Nama">{{ $teacher->name }}</td>
                <td class="px-2 py-1" data-label="NIP">{{ $teacher->nip ?? '-' }}</td>
                <td class="px-2 py-1" data-label="No.Telp">{{ $teacher->phone_number ?? '-' }}</td>
                <td class="px-2 py-1" data-label="Alamat">{{ Str::limit($teacher->address, 20) ?? '-' }}</td>
                <td class="px-2 py-1" data-label="Jabatan">{{ $teacher->position ?? '-' }}</td>
                <td class="px-2 py-1" data-label="Foto">
                  @if($teacher->photo_path)
                  <img src="{{ asset($teacher->photo_path) }}" alt="Foto"
                    class="w-[80px] h-[120px] object-cover mx-auto" />
                  @else
                  -
                  @endif
                </td>
                <td class="px-2 py-1" data-label="Pilihan">
                  <div class="flex justify-center gap-2">
                    <a href="{{ route('guru.edit', $teacher->id) }}" class="text-blue-600 hover:text-blue-800">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-form-{{ $teacher->id }}" action="{{ route('guru.destroy', $teacher->id) }}"
                      method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="text-red-600 hover:text-red-800 delete-btn"
                        data-id="{{ $teacher->id }}" data-name="{{ $teacher->name }}">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
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
  <!-- Add SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Handle delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const teacherId = this.getAttribute('data-id');
        const teacherName = this.getAttribute('data-name');

        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: `Anda akan menghapus data ${teacherName}`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById(`delete-form-${teacherId}`).submit();
          }
        });
      });
    });

    // Show success message if session has 'success'
    @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 3000
    });
    @endif

    // Show error message if session has 'error'
    @if(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Gagal!',
      text: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 3000
    });
    @endif

    // Realtime search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
      const searchValue = this.value.toLowerCase();
      const rows = document.querySelectorAll('#tbodyGuru tr');
      
      rows.forEach(row => {
        const name = row.getAttribute('data-name');
        if (name.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>
</body>

</html>