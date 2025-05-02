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

