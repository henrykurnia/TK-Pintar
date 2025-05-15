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
                @php
$fragment = request()->query('_fragment');
$currentPath = request()->path();
                @endphp

                <a href="{{ url('/?_fragment=hero') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ ($currentPath === '/' && (!$fragment || $fragment === 'hero')) ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Beranda
                </a>
                <a href="{{ url('/?_fragment=sekilas') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ $fragment === 'sekilas' ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Sekilas
                </a>
                <a href="{{ url('/?_fragment=visi-misi') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ $fragment === 'visi-misi' ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Visi-Misi
                </a>
                <a href="{{ url('/?_fragment=artikel') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ $fragment === 'artikel' ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Artikel
                </a>
                <a href="{{ url('/guru-staff') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ $currentPath === 'guru-staff' ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Guru & Staff
                </a>
                <a href="{{ url('/berkas') }}"
                    class="nav-link font-medium transition-colors duration-300 {{ $currentPath === 'berkas' ? 'text-[#0090D4]' : 'text-gray-500 hover:text-[#0090D4]' }}">
                    Pendaftaran
                </a>
            </div>

            <!-- Desktop Login Button -->
            <a href="{{ url('/login') }}"
                class="hidden md:block px-2.5 py-1 text-xs md:px-4 md:py-2 md:text-base bg-[#0090D4] text-white font-semibold rounded-md hover:bg-blue-600 transition-colors duration-300">
                Masuk
            </a>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-[#0090D4] focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white w-full">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @php
$fragment = request()->query('_fragment');
$currentPath = request()->path();
            @endphp

            <a href="{{ url('/?_fragment=hero') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ ($currentPath === '/' && (!$fragment || $fragment === 'hero')) ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Beranda
            </a>
            <a href="{{ url('/?_fragment=sekilas') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ $fragment === 'sekilas' ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Sekilas
            </a>
            <a href="{{ url('/?_fragment=visi-misi') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ $fragment === 'visi-misi' ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Visi-Misi
            </a>
            <a href="{{ url('/?_fragment=artikel') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ $fragment === 'artikel' ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Artikel
            </a>
            <a href="{{ url('/guru-staff') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ $currentPath === 'guru-staff' ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Guru & Staff
            </a>
            <a href="{{ url('/berkas') }}"
                class="block px-3 py-2 rounded-md text-base font-medium {{ $currentPath === 'berkas' ? 'text-[#0090D4] bg-blue-50' : 'text-gray-500 hover:text-[#0090D4] hover:bg-blue-50' }}">
                Pendaftaran
            </a>
        </div>
    </div>
</nav>

<!-- Floating Login Button (Mobile Only) -->
<div class="md:hidden fixed bottom-6 right-6 z-50">
    <a href="{{ url('/login') }}"
        class="flex items-center justify-center w-14 h-14 rounded-full bg-[#0090D4] text-white shadow-lg hover:bg-blue-600 transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
    </a>
</div>

<!-- Scroll + Active Link Highlight Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Fragment handling
        const fragment = new URLSearchParams(window.location.search).get('_fragment');
        if (fragment) {
            const target = document.getElementById(fragment);
            if (target) {
                const navHeight = document.querySelector('nav').offsetHeight;
                const offsetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
            }
        }

        // Dynamic highlight class switching
        function activateLink(fragment) {
            document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(el => {
                el.classList.remove('text-[#0090D4]');
                el.classList.add('text-gray-500');
            });

            const selector = `[href*="_fragment=${fragment}"]`;
            const activeLink = document.querySelector(selector);
            if (activeLink) {
                activeLink.classList.add('text-[#0090D4]');
                activeLink.classList.remove('text-gray-500');
            }
        }

        document.querySelectorAll('a[href*="_fragment="]').forEach(link => {
            link.addEventListener('click', function (e) {
                const url = new URL(this.href);
                const fragment = url.searchParams.get('_fragment');
                if (location.pathname === url.pathname && fragment) {
                    e.preventDefault();
                    const el = document.getElementById(fragment);
                    if (el) {
                        const navHeight = document.querySelector('nav').offsetHeight;
                        const y = el.getBoundingClientRect().top + window.pageYOffset - navHeight;

                        // Tambahkan buffer 10px untuk memastikan tidak tertutup
                        window.scrollTo({ top: y - 10, behavior: 'smooth' });

                        history.replaceState(null, '', `?_fragment=${fragment}`);
                        activateLink(fragment);
                    }
                }
                mobileMenu.classList.add('hidden');
            });
        });
    });
</script>