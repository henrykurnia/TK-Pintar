<nav
  class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
>
  <div
    class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex items-center justify-between w-full"
  >
    <!-- Toggle Button (Mobile Only) -->
    <button
      class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
      type="button"
      onclick="toggleNavbar('example-collapse-sidebar')"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Logo -->
    <a
      class="text-blueGray-600 text-sm uppercase font-bold mx-auto md:mx-0 p-4 px-0"
    >
      TK Pertiwi Grojogan
    </a>

    
    <!-- Sidebar Collapsible (Mobile) -->
    <div
      class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
      id="example-collapse-sidebar"
    >
      <!-- Mobile Logo + Close Button -->
      <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
        <div class="flex flex-wrap">
          <div class="w-6/12">
            <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
              TK Pertiwi Grojogan
            </a>
          </div>
          <div class="w-6/12 flex justify-end">
            <button
              type="button"
              class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
              onclick="toggleNavbar('example-collapse-sidebar')"
            >
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Divider -->
      <hr class="my-4 md:min-w-full hidden md:block" />

      <!-- Navigation -->
      <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
          
          <a href="{{ route('admin.dashboard') }}" class="text-xs uppercase py-3 font-bold block 
            {{ request()->is('admin/dashboard') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
            <i class="fas fa-tv mr-2 text-sm {{ request()->is('admin/dashboard') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Dashboard
          </a>
        </li>
        <li class="items-center">
          <a href="{{ url('/siswa') }}" class="text-xs uppercase py-3 font-bold block 
            {{ request()->is('siswa') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
            <i class="fas fa-graduation-cap mr-2 text-sm {{ request()->is('siswa') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Data Siswa
          </a>
        </li>
        <li class="items-center">
          <a href="{{ url('/guru') }}" class="text-xs uppercase py-3 font-bold block 
            {{ request()->is('guru') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
            <i class="fas fa-chalkboard-user mr-2 text-sm {{ request()->is('guru') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Data Guru dan Staff
          </a>
        </li>
        <li class="items-center">
          <a href="{{ url('/artikel') }}" class="text-xs uppercase py-3 font-bold block 
            {{ request()->is('artikel') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
            <i class="fas fa-newspaper mr-2 text-sm {{ request()->is('artikel') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Artikel
          </a>
          <li class="items-center">
                    <a href="{{ url('/pengumuman') }}" class="text-xs uppercase py-3 font-bold block 
                            {{ request()->is('pengumuman') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
                        <i
                            class="fas fa-reguler fa-bullhorn mr-2 text-sm {{ request()->is('pengumuman') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
                        Pengumuman
                    </a>
                </li>
                 
                <li class="items-center">
                <a href="{{ url('/hblajar') }}" class="text-xs uppercase py-3 font-bold block 
                            {{ request()->is('hblajar') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
                        <i
                            class="fas fa-book mr-2 text-sm {{ request()->is('hblajar') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
                        Hasil Belajar
                    </a>
                </li>
       
        <li class="items-center">
        <a href="{{ url('/pembayaran') }}" class="text-xs uppercase py-3 font-bold block 
                            {{ request()->is('pembayaran') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
                        <i
                            class="fas fa-wallet mr-2 text-sm {{ request()->is('pembayaran') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Pembayaran
          </a>
        </li>
        <li class="items-center">
        <a href="{{ route('admin.profile') }}" class="text-xs uppercase py-3 font-bold block 
            {{ request()->is('admin/profile') ? 'text-[#0090D4]' : 'text-blueGray-700 hover:text-[#0090D4]' }}">
            <i class="fas fa-user mr-2 text-sm {{ request()->is('user') ? 'text-[#0090D4]' : 'text-blueGray-300' }}"></i>
            Profile
          </a>
        </li>
      </ul>
        
      

      
    </div>
  </div>
</nav>
