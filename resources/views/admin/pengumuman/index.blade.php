<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('admin.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>Pengumuman | Admin TK Pintar</title>
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
            .mobile-stack td[data-label="Aksi"] {
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

        /* Class badge styling */
        .class-badge {
            display: inline-block;
            padding: 2px 8px;
            background-color: #e0f2fe;
            color: #0369a1;
            border-radius: 9999px;
            font-size: 0.75rem;
            margin-right: 4px;
            margin-bottom: 4px;
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
                <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">Pengumuman</h1>
                @include('admin.partial.user_info')
            </div>

            <div class="container mx-auto px-4 mt-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
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
                        <input type="text" id="searchInput" placeholder="Cari berdasarkan judul..."
                            class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm" />
                    </div>

                    <!-- Tambah Pengumuman Button -->
                    <div class="min-w-[120px] ml-auto">
                        <a href="{{ route('pengumuman.create') }}"
                            class="bg-[#0090D4] hover:bg-[#1a7a7b] text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition whitespace-nowrap block text-center">
                            <i></i> Tambah
                        </a>
                    </div>
                </div>

                <!-- Announcement Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 text-sm text-left text-gray-700">
                        <thead class="bg-[#0090D4] text-white uppercase text-center table-header-group">
                            <tr>
                                <th class="px-2 py-1">No</th>
                                <th class="px-2 py-1">Judul</th>
                                <th class="px-2 py-1">Isi</th>
                                <th class="px-2 py-1">Tanggal</th>
                                <th class="px-2 py-1">Kepada</th>
                                <th class="px-2 py-1">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody id="announcementTable" class="text-center">
                            @foreach($announcements as $index => $announcement)
                                <tr class="border-b hover:bg-gray-50 mobile-stack"
                                    data-title="{{ strtolower($announcement->title) }}">
                                    <td class="px-2 py-1 text-center" data-label="No">{{ $index + 1 }}</td>
                                    <td class="px-2 py-1" data-label="Judul">{{ $announcement->title }}</td>
                                    <td class="px-2 py-1" data-label="Isi">{{ Str::limit($announcement->content, 50) }}</td>
                                    <td class="px-2 py-1" data-label="Tanggal">
                                        {{ \Carbon\Carbon::parse($announcement->date)->format('d M Y') }}
                                    </td>
                                    <td class="px-2 py-1" data-label="Kepada">
                                        @if($announcement->classes->count() > 0)
                                            @foreach($announcement->classes as $class)
                                                <span class="text-gray-500">
                                                    {{ $class->name }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-500">Semua Kelas</span>
                                        @endif
                                    </td>
                                    <td class="px-2 py-1" data-label="Aksi">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('pengumuman.edit', $announcement->id) }}"
                                                class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pengumuman.destroy', $announcement->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
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

                <!-- Pagination -->
                @if($announcements->hasPages())
                    <div class="mt-4">
                        {{ $announcements->links() }}
                    </div>
                @endif
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
                const announcementId = this.getAttribute('data-id');
                const announcementTitle = this.getAttribute('data-title');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Anda akan menghapus pengumuman "${announcementTitle}"`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${announcementId}`).submit();
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

        // Realtime search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#announcementTable tr');

            rows.forEach(row => {
                const title = row.getAttribute('data-title');
                if (title.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>