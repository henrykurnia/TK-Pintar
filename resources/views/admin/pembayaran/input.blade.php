<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.partial.link')
    <title>Input Pembayaran | Admin TK Pintar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="text-blueGray-700 antialiased">
    @include('admin.partial.navbar')

    <div class="relative md:ml-64 bg-blueGray-50">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
            <h1 class="text-black text-sm uppercase font-semibold lg:inline-block">
                Input Pembayaran - {{ $student->name }} (Kelas {{ $student->class->name ?? '-' }})
            </h1>
            @include('admin.partial.user_info')
        </div>

        <div class="container mx-auto px-4 mt-6">
            <form action="{{ route('pembayaran.store', $student->id) }}" method="POST">
                @csrf

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bulan</label>
                            <select name="month"
                                class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#0090D4]">
                                @foreach($months as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <select name="year"
                                class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#0090D4]">
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status Pembayaran</label>
                            <select name="status"
                                class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#0090D4]">
                                <option value="lunas">Lunas</option>
                                <option value="belum lunas">Belum Lunas</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pembayaran (jika
                                lunas)</label>
                            <input type="date" name="date"
                                class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-[#0090D4]">
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('pembayaran.index') }}"
                            class="border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-[#0090D4] hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow transition">
                            Simpan Pembayaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('admin.partial.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
</body>

</html>