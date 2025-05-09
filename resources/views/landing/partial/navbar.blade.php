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


            <a href="{{ url('/login') }}"
                class="px-2.5 py-1 text-xs md:px-4 md:py-2 md:text-base bg-[#0090D4] text-white font-semibold rounded-md hover:bg-blue-600 transition-colors duration-300">
                Masuk
            </a>
        </div>
    </div>
</nav>

<!-- Bottom Navbar Mobile -->
<div class="md:hidden fixed bottom-0 left-0 w-full bg-white drop-shadow-md z-50">
    <div class="flex justify-around py-3 px-2 text-sm">
        <a href="{{ url('/?_fragment=hero') }}"
            class="mobile-nav-link flex flex-col items-center {{ ($currentPath === '/' && (!$fragment || $fragment === 'hero')) ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">BERANDA</span>
        </a>
        <a href="{{ url('/?_fragment=sekilas') }}"
            class="mobile-nav-link flex flex-col items-center {{ $fragment === 'sekilas' ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">SEKILAS</span>
        </a>
        <a href="{{ url('/?_fragment=visi-misi') }}"
            class="mobile-nav-link flex flex-col items-center {{ $fragment === 'visi-misi' ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">VISI-MISI</span>
        </a>
        <a href="{{ url('/?_fragment=artikel') }}"
            class="mobile-nav-link flex flex-col items-center {{ $fragment === 'artikel' ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">ARTIKEL</span>
        </a>
        <a href="{{ url('/guru-staff') }}"
            class="mobile-nav-link flex flex-col items-center {{ $currentPath === 'guru-staff' ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">GURU & STAFF</span>
        </a>
        <a href="{{ url('/berkas') }}"
            class="mobile-nav-link flex flex-col items-center {{ $currentPath === 'berkas' ? 'text-[#0090D4]' : 'text-gray-500' }}">
            <span class="text-xs">PENDAFTARAN</span>
        </a>
    </div>
</div>

<!-- Scroll + Active Link Highlight Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
                        window.scrollTo({ top: y, behavior: 'smooth' });
                        history.replaceState(null, '', `?_fragment=${fragment}`);
                        activateLink(fragment);
                    }
                }
            });
        });
    });
</script>