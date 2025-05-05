<script>
document.addEventListener('DOMContentLoaded', function() {
    // Improved smooth scroll function
    function smoothScroll(targetId) {
        const target = document.getElementById(targetId);
        if (!target) return;
        
        const navHeight = document.querySelector('nav').offsetHeight;
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = targetPosition - navHeight;
        
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

    // Handle anchor link clicks
    document.querySelectorAll('a[href^="#"], a[href*="/#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            const targetId = href.includes('#') ? href.split('#')[1] : null;
            
            if (targetId) {
                e.preventDefault();
                
                // Update URL first
                if (href.startsWith('{{ url("/") }}')) {
                    history.pushState(null, null, href);
                } else {
                    history.pushState(null, null, '{{ url("/") }}' + href);
                }
                
                // Then scroll
                smoothScroll(targetId);
            }
        });
    });

    // Handle page load with hash
    if (window.location.hash) {
        setTimeout(() => {
            smoothScroll(window.location.hash.substring(1));
        }, 100);
    }

    // Handle back/forward navigation
    window.addEventListener('popstate', function() {
        if (window.location.hash) {
            smoothScroll(window.location.hash.substring(1));
        }
    });
});
</script>






<script>
    const slides = document.querySelectorAll('.slide');
    let current = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = (i === index) ? '1' : '0';
            slide.style.zIndex = (i === index) ? '10' : '0';
        });
    }

    document.getElementById('next').addEventListener('click', () => {
        current = (current + 1) % slides.length;
        showSlide(current);
    });

    document.getElementById('prev').addEventListener('click', () => {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    });

    // Optional: Auto Slide
    setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, 10000); // every 5 seconds
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inisialisasi AOS
    AOS.init({
        once: true, // Animasi hanya sekali
        duration: 800, // Durasi default animasi
        easing: 'ease-out-quad', // Jenis easing
        offset: 120 // Offset trigger (px dari bawah viewport)
    });
</script>

<section id="hero" class="relative w-full md:h-screen aspect-[16/9] overflow-hidden">
    <div id="slides" class="w-full h-full relative">
        @if(isset($heroSections) && $heroSections->count() > 0)
            @foreach($heroSections as $index => $hero)
                <img src="{{ $hero->image_url }}"
                    class="slide w-full h-full object-cover object-center absolute transition-opacity duration-700 {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}"
                    alt="Hero Image {{ $index + 1 }}" />
            @endforeach
        @else
            <!-- Default fallback images if no hero sections are uploaded -->
            <img src="{{ asset('img/hero-img.png') }}"
                class="slide w-full h-full object-cover object-center absolute transition-opacity duration-700 opacity-100 z-10"
                alt="Default Hero Image 1" />
        @endif
    </div>

    <!-- Always show buttons but control functionality with JavaScript -->
    <button id="prev"
        class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-1.5 md:p-2 rounded-full shadow-md z-20 {{ !isset($heroSections) || $heroSections->count() <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
        <i class="fas fa-chevron-left text-lg md:text-xl"></i>
    </button>
    <button id="next"
        class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-1.5 md:p-2 rounded-full shadow-md z-20 {{ !isset($heroSections) || $heroSections->count() <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
        <i class="fas fa-chevron-right text-lg md:text-xl"></i>
    </button>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prev');
        const nextBtn = document.getElementById('next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
                if (i === index) {
                    slide.classList.add('opacity-100', 'z-10');
                    slide.classList.remove('opacity-0', 'z-0');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
            resetInterval();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
            resetInterval();
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        if (slides.length > 1) {
            prevBtn?.addEventListener('click', prevSlide);
            nextBtn?.addEventListener('click', nextSlide);
            slideInterval = setInterval(nextSlide, 5000);
        }
    });
</script>