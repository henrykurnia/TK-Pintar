<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Atur Kelas Siswa | Admin TK Pintar</title>
  <style>
    @media (max-width: 768px) {
      .table-header-group {
        display: none;
      }

      .mobile-stack td {
        display: block;
        text-align: right;
        padding: 0.5rem;
        border-bottom: 1px solid #e5e7eb;
      }

      .mobile-stack td:before {
        content: attr(data-label);
        float: left;
        font-weight: bold;
        color: #374151;
      }

      .mobile-stack tr:last-child td {
        border-bottom: 2px solid #e5e7eb;
      }

      .container {
        padding-left: 1rem;
        padding-right: 1rem;
      }

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
        <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">Atur Kelas Siswa</h1>
        @include('admin.partial.user_info')
      </div>

      <div class="container mx-auto px-4 mt-6">
        <form action="{{ route('siswa.update_kelas') }}" method="POST">
          @csrf
          
          <!-- Search & Buttons -->
          <div class="flex flex-wrap items-center gap-2 mb-4">
            <!-- Search Input -->
            <div class="relative flex-1 min-w-[150px]">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-[#0090D4]"></i>
              </span>
              <input type="text" id="searchInput" placeholder="Cari berdasarkan nama..."
                class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
            </div>

            <!-- Button Aksi -->
            <div class="flex gap-2 ml-auto">
              <a href="{{ route('siswa.index') }}"
                class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                Batal
              </a>
              <button type="submit"
                class="bg-[#0090D4] hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                Simpan Perubahan
              </button>
            </div>
          </div>

          <!-- Tabel Data Siswa -->
          <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm text-left text-gray-700">
              <thead class="bg-[#0090D4] text-white uppercase text-center table-header-group">
                <tr>
                  <th class="px-2 py-1">No</th>
                  <th class="px-2 py-1">Nama</th>
                  <th class="px-2 py-1">TTL</th>
                  <th class="px-2 py-1">Jenis Kelamin</th>
                  <th class="px-2 py-1">Agama</th>
                  <th class="px-2 py-1">Kelas Saat Ini</th>
                  <th class="px-2 py-1">Atur Kelas</th>
                </tr>
              </thead>
              <tbody id="tbodySiswa" class="text-center">
                @foreach ($students as $student)
                  <tr class="border-b hover:bg-gray-50 mobile-stack" data-name="{{ strtolower($student->name) }}">
                    <td class="px-2 py-1" data-label="No">{{ $student->number }}</td>
                    <td class="px-2 py-1" data-label="Nama">{{ $student->name }}</td>
                    <td class="px-2 py-1" data-label="TTL">{{ $student->ttl }}</td>
                    <td class="px-2 py-1" data-label="Jenis Kelamin">
                      {{ $student->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
                    </td>
                    <td class="px-2 py-1" data-label="Agama">{{ $student->religion }}</td>
                    <td class="px-2 py-1" data-label="Kelas Saat Ini">
                      <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                        {{ $student->class->name ?? '-' }}
                      </span>
                    </td>
                    <td class="px-2 py-1" data-label="Atur Kelas">
                      <select name="students[{{ $loop->index }}][class_id]" class="border rounded px-2 py-1 w-full text-sm">
                        <option value="">Pilih Kelas</option>
                        @foreach ($classes as $class)
                          <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}
                          </option>
                        @endforeach
                      </select>
                      <input type="hidden" name="students[{{ $loop->index }}][id]" value="{{ $student->id }}">
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('admin.partial.script')
  
  <script>
    // Realtime search functionality
    document.getElementById('searchInput').addEventListener('input', function () {
      const searchValue = this.value.toLowerCase();
      const rows = document.querySelectorAll('#tbodySiswa tr');

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