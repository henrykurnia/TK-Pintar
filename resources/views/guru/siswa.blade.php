<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('guru.partial.link')
  <title>Data Siswa | Guru TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('guru.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
       <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Data Siswa</a>

        @include('guru.partial.user_info')
        



      </div>

      <div class="container mx-auto px-4 mt-6">

        <!-- Search, Dropdown & Button -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
          
          <!-- Search Input -->
          <div class="relative flex-1 min-w-[150px]">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-[#0090D4]"></i>
            </span>
            <input
              type="text"
              placeholder="Cari siswa"
              class="pl-10 pr-4 py-2 w-full border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm"
            />
          </div>

          <!-- Dropdown -->
          <div class="relative min-w-[120px]">
            <select
              id="kelasSelect"
              class="w-full py-2 px-3 border border-[#0090D4] rounded-lg shadow-sm focus:outline-none focus:ring focus:border-[#0090D4] text-sm"
              onchange="gantiKelas(this.value)"
            >
              <option value="a1" selected>Kelas A1</option>
              <option value="a2">Kelas A2</option>
              <option value="b1">Kelas B1</option>
              <option value="b2">Kelas B2</option>
            </select>
          </div>

        
        </div>

        <!-- Header Tabel -->
        <h2 id="headerKelas" class="text-lg font-semibold mb-2 text-[#0090D4]">Kelas A1</h2>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200 text-sm text-left text-gray-700">
            <thead class="bg-[#0090D4] text-white uppercase text-center">
              <tr>
                <th class="no px-2 py-1">No</th>
                <th class="nama px-2 py-1">Nama</th>
                <th class="kelas px-2 py-1">Kelas</th>
                <th class="jk px-2 py-1">Jenis Kelamin</th>
                <th class="alamat px-2 py-1">Alamat</th>
                <th class="no_telp px-2 py-1">No.Telp</th>
                
              </tr>
            </thead>
            <tbody id="tbodySiswa" class="text-center">
              <!-- Data akan diubah oleh JS -->
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  @include('guru.partial.script')

  <script>
    const dataKelas = {
      a1: [
        { nama: "Budi", kelas: "A1", jk: "Laki-laki", alamat: "Jl. Melati No. 5", telp: "08123456789" },
        { nama: "Sita", kelas: "A1", jk: "Perempuan", alamat: "Jl. Anggrek No. 10", telp: "08134567890" },
      ],
      a2: [
        { nama: "Andi", kelas: "A2", jk: "Laki-laki", alamat: "Jl. Kamboja No. 2", telp: "08121234567" },
      ],
      b1: [],
      b2: [],
    };

    function renderTable(data) {
      const tbody = document.getElementById("tbodySiswa");
      tbody.innerHTML = "";

      if (data.length === 0) {
        tbody.innerHTML = `<tr><td colspan="7" class="py-2 text-center text-gray-400 italic">Belum ada data siswa</td></tr>`;
        return;
      }

      data.forEach((item, index) => {
        tbody.innerHTML += `
          <tr>
            <td class="px-2 py-1">${index + 1}</td>
            <td class="px-2 py-1">${item.nama}</td>
            <td class="px-2 py-1">${item.kelas}</td>
            <td class="px-2 py-1">${item.jk}</td>
            <td class="px-2 py-1">${item.alamat}</td>
            <td class="px-2 py-1">${item.telp}</td>
          

        `;
      });
    }

    function gantiKelas(kelas) {
      document.getElementById("headerKelas").innerText = "Kelas " + kelas.toUpperCase();
      renderTable(dataKelas[kelas] || []);
    }

    // Render default A1 saat halaman load
    document.addEventListener("DOMContentLoaded", () => {
      renderTable(dataKelas["a1"]);
    });
  </script>
</body>
</html>
