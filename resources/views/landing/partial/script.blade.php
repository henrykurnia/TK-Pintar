<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                const offset = 80; // Sesuaikan dengan tinggi navbar
                const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
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

