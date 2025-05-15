<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">
  <title>Data Siswa | Admin TK Pintar</title>
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
        <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">Data Siswa</h1>
        @include('admin.partial.user_info')
      </div>

      <div class="container mx-auto px-4 mt-6">
        @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

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

          <!-- Buttons Group -->
           
          <div class="flex gap-2 ml-auto">
          <div class="relative inline-block text-left">
              <button type="button" 
                      class="flex items-center gap-2 border border-[#0090D4] text-[#0090D4] hover:bg-[#0090D4] hover:text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap dropdown-filter-btn">
                <i class="fas fa-filter"></i>
                Filter Kelas
                <i class="fas fa-chevron-down ml-1"></i>
              </button>

              <div class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10 hidden dropdown-filter-menu">
                <div class="py-1" role="none">
                  <a href="#" data-filter="all" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 filter-option">
                    <i class="fas fa-list-ul mr-2"></i> Semua
                  </a>
                  <a href="#" data-filter="A1" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 filter-option">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> A1
                  </a>
                  <a href="#" data-filter="A2" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 filter-option">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> A2
                  </a>
                  <a href="#" data-filter="B1" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 filter-option">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> B1
                  </a>
                  <a href="#" data-filter="B2" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 filter-option">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> B2
                  </a>
                </div>
              </div>
            </div>
            <a href="{{ route('siswa.atur_kelas') }}"
              class="flex items-center gap-2  text-white bg-[#0090D4] hover:bg-blue-700 hover:text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap">
              <i class="fas fa-users-class"></i>
              Atur Kelas
            </a>
            </a>
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
                <th class="px-2 py-1">Kelas</th>
              </tr>
            </thead>
            <tbody id="tbodySiswa" class="text-center">
              @foreach($students as $student)
          <tr class="border-b hover:bg-gray-50 mobile-stack" data-name="{{ strtolower($student->name) }}">
          <td class="px-2 py-1" data-label="No">{{ $student->number }}</td>
          <td class="px-2 py-1" data-label="Nama">{{ $student->name }}</td>
          <td class="px-2 py-1" data-label="TTL">{{ $student->ttl }}</td>
          <td class="px-2 py-1" data-label="Jenis Kelamin">
            {{ $student->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
          </td>
          <td class="px-2 py-1" data-label="Agama">{{ $student->religion }}</td>
          <td class="px-2 py-1" data-label="Kelas">
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
            {{ $student->class->name ?? '-' }}
            </span>
          </td>
          </tr>
        @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
       
      </div>
    </div>
  </div>

  @include('admin.partial.script')
  <!-- Add SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Toggle dropdown
  const filterBtn = document.querySelector('.dropdown-filter-btn');
  const filterMenu = document.querySelector('.dropdown-filter-menu');
  
  filterBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    filterMenu.classList.toggle('hidden');
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', function() {
    filterMenu.classList.add('hidden');
  });

  // Filter functionality
  const filterOptions = document.querySelectorAll('.filter-option');
  
  filterOptions.forEach(option => {
    option.addEventListener('click', function(e) {
      e.preventDefault();
      const filterValue = this.getAttribute('data-filter');
      filterStudents(filterValue);
      
      // Update button text
      const btnText = filterValue === 'all' ? 'Filter Kelas' : `Kelas ${filterValue}`;
      filterBtn.innerHTML = `
        <i class="fas fa-filter"></i>
        ${btnText}
        <i class="fas fa-chevron-down ml-1"></i>
      `;
      
      filterMenu.classList.add('hidden');
    });
  });

  function filterStudents(classFilter) {
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
      const classCell = row.querySelector('td:nth-child(6)'); // Adjust index if needed
      const className = classCell ? classCell.textContent.trim() : '';
      
      if (classFilter === 'all' || className === classFilter) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  // Initialize filter if URL has parameter
  const urlParams = new URLSearchParams(window.location.search);
  const classFilter = urlParams.get('filter');
  
  if (classFilter) {
    filterStudents(classFilter);
    
    // Update button text
    const btnText = classFilter === 'all' ? 'Filter Kelas' : `Kelas ${classFilter}`;
    filterBtn.innerHTML = `
      <i class="fas fa-filter"></i>
      ${btnText}
      <i class="fas fa-chevron-down ml-1"></i>
    `;
  }
});
</script>


</body>

</html>