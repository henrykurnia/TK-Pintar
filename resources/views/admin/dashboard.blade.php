<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @include('admin.partial.link')
    <title>Dashboard | Admin TK Pintar</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    @include('admin.partial.navbar')

    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      <div class="relative md:ml-64 bg-blueGray-50">
        <nav
          class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
          >
          
          </div>
        </nav>

        <!-- Header -->
        <div class="relative bg-[#0090D4] md: pb-32 pt-3">
         
<div class="px-4 md:px-10 mx-auto w-full mb-4">
  <div class="flex justify-between items-center">
    <!--  Dashboard Title -->
    <a class="text-white text-sm uppercase font-semibold">
      Dashboard
    </a>

    <!--  User Info -->
    <div class="flex items-center gap-3 text-white">
      <img
        src="{{ asset('images/user.jpg') }}"
        alt="User Photo"
        class="fotoProfil w-10 h-10 rounded-full object-cover shadow"
      />
      <div class="leading-tight text-right">
        <p class="usernametext-sm font-semibold">Gus Ris</p>
        <p class="jabatan text-xs">Admin</p>
      </div>
    </div>
  </div>
</div>


          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
              <!-- Card stats -->
              <div class="flex flex-wrap">
                <!-- Card 1 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                  >
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Jumlah Siswa
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            350,897
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                          >
                            <i class="far fa-chart-bar"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last month </span>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- Card 2 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Jumlah Guru & Staff
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">2,356</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                          >
                            <i class="fas fa-chart-pie"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- Card 3 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Pembayaran Lunas
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">924</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500"
                          >
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-orange-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 1.10%
                        </span>
                        <span class="whitespace-nowrap"> Since yesterday </span>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- Card 4 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Pembayaran Belum Lunas
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">49,65%</span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500"
                          >
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 12%
                        </span>
                        <span class="whitespace-nowrap"> Since last month </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content bawah -->
        <div class="flex flex-wrap mt-6" x-data="{ showUploadForm: false }">
          <!-- Hero Section -->
          <div class="w-full lg:w-6/12 px-4 mb-6">
            <div class="bg-white shadow-lg rounded p-6">
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-blueGray-700">
                  <span x-show="!showUploadForm">Hero Section</span>
                  <span x-show="showUploadForm">Upload Foto</span>
                </h2>
                <template x-if="!showUploadForm">
                  <button
                    class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 text-sm w-9 h-9 flex items-center justify-center"
                    title="Tambah"
                    @click="showUploadForm = true"
                  >
                    <i class="fas fa-plus"></i>
                  </button>
                </template>
              </div>

              <div class="overflow-x-auto" x-show="!showUploadForm">
                <table class="min-w-full text-sm text-left">
                  <thead class="border-b font-semibold text-blueGray-600">
                    <tr>
                      <th class="py-2 px-4">Foto</th>
                      <th class="py-2 px-4">Tanggal Upload</th>
                      <th class="py-2 px-4">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-b hover:bg-blueGray-50">
                      <td class="py-2 px-4">
                        <img src="https://via.placeholder.com/80" alt="Foto" class="w-16 h-16 object-cover rounded" />
                      </td>
                      <td class="py-2 px-4">05 Apr 2025</td>
                      <td class="py-2 px-4 space-x-2">
                        <button class="text-yellow-500 hover:underline">Edit</button>
                        <button class="text-red-500 hover:underline">Hapus</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div x-show="showUploadForm" x-transition>
                <form>
                  <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Pilih Foto</label>
                    <input type="file" class="block w-full text-sm border border-gray-300 rounded px-3 py-2" />
                  </div>
                  <div class="flex justify-end space-x-2">
                    <button
                      type="button"
                      class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded"
                      @click="showUploadForm = false"
                    >
                      Batal
                    </button>
                    <button
                      type="submit"
                      class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
                    >
                      Simpan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Artikel -->
          <div class="w-full lg:w-6/12 px-4 mb-6">
            <div class="bg-white shadow-lg rounded p-6">
              <h2 class="text-xl font-semibold text-blueGray-700 mb-4">Artikel terbaru</h2>
              <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                  <thead class="border-b font-semibold text-blueGray-600">
                    <tr>
                      <th class="py-2 px-4">Judul</th>
                      <th class="py-2 px-4">Tanggal</th>
                      <th class="py-2 px-4">Gambar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-b hover:bg-blueGray-50">
                      <td class="py-2 px-4">Tips Menjaga Kesehatan</td>
                      <td class="py-2 px-4">01 Apr 2025</td>
                      <td class="py-2 px-4">
                        <button class="text-blue-500 hover:underline">Lihat</button>
                      </td>
                    </tr>
                    <tr class="border-b hover:bg-blueGray-50">
                      <td class="py-2 px-4">Cara Hemat di Bulan Ramadan</td>
                      <td class="py-2 px-4">30 Mar 2025</td>
                      <td class="py-2 px-4">
                        <button class="text-blue-500 hover:underline">Lihat</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.partial.script')
  </body>
</html>
