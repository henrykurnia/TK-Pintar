<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Data Siswa | Admin TK Pintar</title>
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

        <!-- Search, Dropdown & Button -->
        <div class="flex flex-wrap items-center gap-2 mb-4">

          <!-- Search Input -->
          <form method="GET" action="{{ route('siswa.index') }}" class="relative flex-1 min-w-[150px]">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-[#0090D4]"></i>
            </span>
            <input type="text" name="search" placeholder="Cari siswa" value="{{ request('search') }}"
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
          </form>

          <!-- Dropdown -->
          <div class="relative min-w-[120px]">
            <select id="kelasSelect"
              class="w-full py-2 px-3 border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm"
              onchange="window.location.href='{{ route('siswa.index') }}?class='+this.value">
              <option value="">Semua Kelas</option>
              @foreach($classes as $class)
          <option value="{{ $class->id }}" {{ request('class') == $class->id ? 'selected' : '' }}>
          {{ $class->name }}
          </option>
        @endforeach
            </select>
          </div>

          <!-- Tambah Siswa Button -->
          <div class="min-w-[120px] ml-auto">
            <a href="{{ route('siswa.create') }}"
              class="bg-[#0090D4] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
              Tambah Siswa
            </a>
          </div>

        </div>

        @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

        <!-- Header Tabel -->
        <h2 class="text-lg font-semibold mb-2 text-[#0090D4]">
          @if(request('class'))
        Kelas {{ $classes->firstWhere('id', request('class'))->name }}
      @else
        Semua Siswa
      @endif
        </h2>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-[#0090D4] text-white uppercase text-center">
              <tr>
                <th class="px-2 py-1">No.absen</th>
                <th class="px-2 py-1">Nama</th>
                <th class="px-2 py-1">TTL</th>
                <th class="px-2 py-1">Jenis Kelamin</th>
                <th class="px-2 py-1">Agama</th>
                <th class="px-2 py-1">Kelas</th>
                <th class="px-2 py-1">Pilihan</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @forelse($students as $student)
          <tr class="border-b hover:bg-gray-50">
          <td class="px-2 py-1">{{ $student->number ?? '-' }}</td>
          <td class="px-2 py-1">{{ $student->name }}</td>
          <td class="px-2 py-1">{{ $student->ttl ?? '-' }}</td>
          <td class="px-2 py-1">{{ $student->gender ?? '-' }}</td>
          <td class="px-2 py-1">{{ $student->religion ?? '-' }}</td>
          <td class="px-2 py-1">{{ $student->class->name ?? '-' }}</td>
          <td class="px-2 py-1 flex justify-center gap-2">
            <!-- Edit Button -->
            <a href="{{ route('siswa.edit', $student->id) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded-md shadow transition text-sm">
            <i class="fas fa-edit"></i>
            </a>

            <!-- Delete Button -->
            <form action="{{ route('siswa.destroy', $student->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-md shadow transition text-sm"
              onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
              <i class="fas fa-trash-alt"></i>
            </button>
            </form>
          </td>
          </tr>
        @empty
          <tr>
          <td colspan="7" class="py-4 text-center text-gray-400 italic">Belum ada data siswa</td>
          </tr>
        @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        @if($students->hasPages())
      <div class="mt-4">
        {{ $students->appends(request()->query())->links() }}
      </div>
    @endif

      </div>
    </div>
  </div>

  @include('admin.partial.script')
</body>

</html>