<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('admin.partial.link')
  <title>Profile | Admin TK Pintar</title>
</head>
<body class="text-blueGray-700 antialiased">
  @include('admin.partial.navbar')
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="root">
    <div class="relative md:ml-64 bg-blueGray-50">
      
       <!-- HEADER -->
      <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
        <a class="text-black text-sm uppercase font-semibold lg:inline-block">Profile</a>

        @include('admin.partial.user_info')
        



      </div>
<div class="bg-white rounded-2xl max-w-4xl mx-auto p-8 mt-8 shadow-md">
  <!-- Header Utama -->
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Informasi Pengguna</h2>

  <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-4">
    <!-- Kiri: Foto Profil + Tombol di tengah -->
    <div class="flex flex-col items-center justify-center">
      <img 
        src="img/pp.png" 
        alt="Foto Profil" 
        class="w-28 h-28 rounded-full object-cover shadow"
      />
      <button class="mt-4 px-5 py-2 bg-white text-gray text-sm border rounded-md hover:bg-gray-100 transition">
        Edit Profile
      </button>
    </div>

    <!-- Kanan: Formulir -->
    <div>
      <form class="grid grid-cols-1 gap-6">
        <!-- Username -->
        <div>
          <label class="block text-gray-700 text-sm font-semibold mb-1">Nama Pengguna</label>
          <input 
            type="text" 
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
          />
        </div>

        <!-- Jabatan -->
        <div>
          <label class="block text-gray-700 text-sm font-semibold mb-1">Jabatan</label>
          <input 
            type="text" 
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
          />
        </div>

        <!-- Email -->
        <div>
          <label class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
          <input 
            type="email" 
            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
          />
        </div>
      </form>
    </div>
  </div>
</div>

</div>

</div>

  </div>
</div>

</div>

</div>


     
    </div>
  </div>

  @include('admin.partial.script')

  
</body>
</html>
