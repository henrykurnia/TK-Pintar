<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="icon" type="icon" href="/img/logo tutwuri.png">

  @include('admin.partial.link')
  <title>Dashboard | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')

  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      <nav
        class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">

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
           <div class="flex items-center justify-end gap-3 text-white">
  <div class="leading-tight text-right">
    <p class="email text-sm font-semibold">{{ Auth::user()->email }}</p>
    <p class="jabatan text-xs">{{ Auth::user()->role ?? 'Admin' }}</p>
  </div>
  @php
$profileImage = Auth::user()->imageUrls->where('jenis', 'teacher')->sortByDesc('created_at')->first();
$imageUrl = $profileImage ? asset($profileImage->url) . '?v=' . time() : asset('img/pp.png');
  @endphp
  <img src="{{ $imageUrl }}" alt="User Photo" class="fotoProfil w-10 h-10 rounded-full object-cover shadow" />
</div>
          </div>
        </div>


        <div class="px-4 md:px-10 mx-auto w-full">
          <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
              <!-- Card 1 -->
              <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                      <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                          Jumlah Siswa
                        </h5>
                        
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div
                          class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                          <i class="far fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                  
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
                       
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div
                          class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>
               
                      
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
                       
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div
                          class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                    
                     
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
                      
                      </div>
                      <div class="relative w-auto pl-4 flex-initial">
                        <div
                          class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                    </div>
                  
                      
                      
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     <div class="flex flex-wrap mt-6">
  <!-- Hero Section -->
  <div class="w-full px-4 mb-6">
    <div class="bg-white shadow-lg rounded-lg p-6" x-data="{ showUploadForm: false, imagePreview: null }">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">
          <span x-show="!showUploadForm">Hero Section</span>
          <span x-show="showUploadForm">Upload Foto</span>
        </h2>

        @if(count($heroImages) < 4)
          <template x-if="!showUploadForm">
            <button
              class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 text-sm w-9 h-9 flex items-center justify-center"
              title="Tambah"
              @click="showUploadForm = true">
              <i class="fas fa-plus"></i>
            </button>
          </template>
        @endif
      </div>

      <!-- Image Grid Display -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6" x-show="!showUploadForm">
        @forelse ($heroImages as $image)
          <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
            <img src="{{ asset($image->image_path) }}" 
                 alt="Hero Image"
                 class="w-full h-40 object-cover">
            <div class="p-3">
              <p class="text-sm text-gray-500 mb-2">
                {{ $image->created_at->format('d M Y') }}
              </p>
              <form action="{{ route('admin.hero.delete', $image->id) }}" method="POST"
                    onsubmit="return confirm('Yakin hapus gambar ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                  <i class="fas fa-trash mr-1"></i> Hapus
                </button>
              </form>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center py-8 text-gray-400">
            Belum ada foto hero.
          </div>
        @endforelse
      </div>

      <!-- Upload Form -->
      <div x-show="showUploadForm" x-transition class="border-t pt-4">
        @if(count($heroImages) >= 4)
          <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
            Maksimal 4 foto diperbolehkan. Hapus salah satu untuk menambah.
          </div>
        @else
          <form action="{{ route('admin.hero.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Foto</label>
              <input type="file" name="image" required accept="image/*"
                     @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = e => imagePreview = e.target.result; reader.readAsDataURL(file); }"
                     class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700
                            hover:file:bg-blue-100" />
            </div>

            <!-- Preview -->
            <div x-show="imagePreview" class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Preview:</label>
              <img :src="imagePreview" alt="Preview" class="w-full max-w-xs h-auto object-cover rounded shadow" />
            </div>

            <div class="flex justify-end space-x-2">
              <button type="button"
                      class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded text-sm"
                      @click="showUploadForm = false; imagePreview = null;">
                Batal
              </button>
              <button type="submit"
                      class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                Simpan
              </button>
            </div>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>
  @include('admin.partial.script')
</body>

</html>