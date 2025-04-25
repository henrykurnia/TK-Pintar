<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('admin.partial.link')
    <title>Pengumuman | Guru TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
    @include('guru.partial.navbar')
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <div class="relative md:ml-64 bg-blueGray-50">

            <!-- HEADER -->
            <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
                <a class="text-black text-sm uppercase font-semibold lg:inline-block">Pengumuman</a>
                @include('guru.partial.user_info')
            </div>

            <!-- FORM CONTAINER -->
            <div class="p-6">
                <form action="#" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow-md">
                    <!-- Form 1: Informasi Pengumuman -->
                    <div>
                        <label for="pengumuman" class="block text-sm font-medium text-gray-700 mb-2">Informasi
                            Pengumuman</label>
                        <textarea id="pengumuman" name="pengumuman" rows="6"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Tulis isi pengumuman di sini..."></textarea>
                    </div>

                    <!-- Form 2 & 3: Tanggal dan Disampaikan Kepada -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                        </div>

                        <div>
                            <label for="kepada" class="block text-sm font-medium text-gray-700 mb-2">Disampaikan
                                Kepada</label>
                                <select id="kepada" name="kepada" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none:ring focus-blue-300">
                                    <option value="penerima">Pilih Penerima</option>
                                    <option value="semua">Semua</option>
                                    <option value="kelas-a1">Kelas A1</option>
                                    <option value="kelas-a2">Kelas A2</option>
                                    <option value="kelas-b1">Kelas B1</option>
                                    <option value="kelas-b2">Kelas B2</option>
                                    
                                </select>
                           
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button type="reset"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.partial.script')
</body>

</html>