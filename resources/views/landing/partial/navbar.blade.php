<nav class="bg-white drop-shadow-md fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <img class="h-8 w-auto" src="/img/logo tutwuri.png" alt="Logo">
                <span class="ml-4 text-lg font-bold text-[#0090D4]">TK Pertiwi Grojogan</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#hero" class="text-gray-900 font-medium relative group">
                    Beranda
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#sekilas" class="text-gray-500 hover:text-gray-900 font-medium relative group">
                    Sekilas
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 font-medium relative group">
                    Visi-Misi
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 font-medium relative group">
                    Artikel
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 font-medium relative group">
                    Guru & Staff
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 font-medium relative group">
                    Pendaftaran
                    <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0090D4] transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Tombol Masuk -->
                <a href="{{ url('/login') }}"
                class="px-4 py-2 bg-[#0090D4] text-white font-semibold rounded-md hover:bg-[#1b7a72] transition inline-block">
                Masuk
                </a>

        </div>
    </div>
</nav>

<!-- Bottom Navbar Mobile -->
<div class="md:hidden fixed bottom-0 left-0 w-full bg-white drop-shadow-md z-50">
    <div class="flex justify-around py-3 px-2 text-sm text-gray-700">
        <a href="#hero" class="flex flex-col items-center text-[#0090D4]">
            <i class="fas fa-home text-lg mb-1"></i>
            <span class="text-xs">Beranda</span>
        </a>
        <a href="#sekilas" class="flex flex-col items-center">
            <i class="fas fa-info-circle text-lg mb-1"></i>
            <span class="text-xs">Sekilas</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <i class="fas fa-bullseye text-lg mb-1"></i>
            <span class="text-xs">Visi-Misi</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <i class="fas fa-newspaper text-lg mb-1"></i>
            <span class="text-xs">Artikel</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <i class="fas fa-user-friends text-lg mb-1"></i>
            <span class="text-xs">Guru-Staff</span>
        </a>
        <a href="#" class="flex flex-col items-center">
            <i class="fas fa-user-plus text-lg mb-1"></i>
            <span class="text-xs">Pendaftaran</span>
        </a>
    </div>
</div>
