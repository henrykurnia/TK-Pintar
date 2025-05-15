<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('admin.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>Input Nilai | Admin TK Pintar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .grade-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1em;
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
                <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">
                    Input Nilai - {{ $student->name }} (Kelas {{ $student->class->name ?? '-' }})
                </h1>
                @include('admin.partial.user_info')
            </div>

            <div class="container mx-auto px-4 mt-6">
                <form id="nilaiForm" action="{{ route('hasil-belajar.simpan', $student->id) }}" method="POST">
                    @csrf

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-200 text-sm text-left text-gray-700">
                                <thead class="bg-[#0090D4] text-white uppercase text-center">
                                    <tr>
                                        <th class="px-4 py-2">Mata Pelajaran</th>
                                        <th class="px-4 py-2">Nilai</th>
                                        <th class="px-4 py-2">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($courses as $course)
                                        @php
                                            $value = $values[$course->id] ?? null;
                                            $currentGrade = $value->value ?? old('values.' . $course->id);
                                        @endphp
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $course->name }}</td>
                                            <td class="px-4 py-2">
                                                <input type="hidden" name="course_ids[]" value="{{ $course->id }}">
                                                <select name="values[{{ $course->id }}]"
                                                    class="grade-select w-20 px-2 py-1 border rounded text-center focus:outline-none focus:ring focus:border-[#0090D4]">
                                                    <option value="">- Pilih -</option>
                                                    <option value="A" {{ $currentGrade == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ $currentGrade == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{ $currentGrade == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{ $currentGrade == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="E" {{ $currentGrade == 'E' ? 'selected' : '' }}>E</option>
                                                </select>
                                            </td>
                                            <td class="px-4 py-2">
                                                <input type="text" name="informations[{{ $course->id }}]"
                                                    value="{{ $value->information ?? old('informations.' . $course->id) }}"
                                                    class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:border-[#0090D4]"
                                                    placeholder="Keterangan">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('hasil-belajar.index') }}"
                            class="border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                            Batal
                        </a>
                        <button type="button" onclick="confirmSubmit()"
                            class="bg-[#0090D4] hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                            Simpan Nilai
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.partial.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmSubmit() {
            Swal.fire({
                title: 'Simpan Nilai?',
                text: "Apakah Anda yakin ingin menyimpan nilai-nilai ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0090D4',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('nilaiForm').submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Realtime search functionality (if you have search input)
        document.getElementById('searchInput')?.addEventListener('input', function () {
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