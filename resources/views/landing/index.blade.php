 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>TK Pertiwi Grojogan</title>
</head>
<script src="//unpkg.com/alpinejs" defer></script>
<body class="bg-gray-100 ">

 @include('landing.partial.navbar')

<section id="hero" class="relative w-full md:h-screen aspect-[16/9] overflow-hidden">
    <div id="slides" class="w-full h-full relative">
        <img src="img/hero-img.png"
            class="slide w-full h-full object-cover object-center absolute transition-opacity duration-700 opacity-100 z-10" />

        <img src="img/bg-login.png"
            class="slide w-full h-full object-cover object-center absolute transition-opacity duration-700 opacity-0 z-0" />

        <img src="img/bg-login.png"
            class="slide w-full h-full object-cover object-center absolute transition-opacity duration-700 opacity-0 z-0" />
    </div>

  
    <button id="prev"
        class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-1.5 md:p-2 rounded-full shadow-md z-20">
        <i class="fas fa-chevron-left text-lg md:text-xl"></i>
    </button>
    <button id="next"
        class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-1.5 md:p-2 rounded-full shadow-md z-20">
        <i class="fas fa-chevron-right text-lg md:text-xl"></i>
    </button>
</section>


<!-- sekilas -->
<section id="sekilas" class="sekilas min-h-screen bg-[#0090D4]">
    <div class="container mx-auto pt-8 px-4">
        <h1 class="font-bold text-[20px] md:text-[32px] text-white flex items-center justify-center text-center"
            data-aos="fade-down" data-aos-duration="800">
            PENGENALAN
        </h1>
        <p class="font-regular text-[14px] md:text-[18px] text-center text-white flex justify-center px-6 md:px-20"
            data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            TK Pertiwi Grojogan adalah suatu sarana pembelajaran awal anak, yang dimana anak-anak dapat mengembangkan
            kemampuan di berbagai bidang dan membantu karakter anak yang berakhlak dan berbudi luhur.
        </p>

        <h1 class="font-bold text-[20px] md:text-[32px] text-white flex items-center justify-center text-center mt-4"
            data-aos="fade-down" data-aos-duration="800" data-aos-delay="400">
            TUJUAN
        </h1>
        <p class="font-regular text-[14px] md:text-[18px] text-center text-white flex justify-center px-6 md:px-10"
            data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
            Pembelajaran di TK Pertiwi Grojogan memiliki beberapa tujuan
        </p>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-2 p-4 md:p-8">
    <!-- Card 1 -->
    <div class="group bg-white p-5 rounded-lg shadow-lg text-center hover:shadow-xl transition-all duration-300" 
         data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
        <div class="overflow-hidden rounded-md border-b-2 border-[#0090D4]">
            <img src="/img/t-1.png" alt=""
                class="w-full aspect-[16/9] object-cover ">
        </div>
        <p class="mt-3 text-black font-medium text-sm md:text-base ">
            Terbentuknya peserta didik yang berakhlak mulia dan berbudi pekerti yang luhur
        </p>
    </div>
    
    <!-- Card 2 -->
    <div class="group bg-white p-5 rounded-lg shadow-lg text-center hover:shadow-xl transition-all duration-300" 
         data-aos="fade-up" data-aos-duration="800" data-aos-delay="900">
        <div class="overflow-hidden rounded-md border-b-2 border-[#0090D4]">
            <img src="/img/t-2.png" alt=""
                class="w-full aspect-[16/9] object-cover ">
        </div>
        <p class="mt-3 text-black font-medium text-sm md:text-base ">
            Terwujudnya siswa yang cerdas berkualitas dan berkembang sesuai usianya
        </p>
    </div>
    
    <!-- Card 3 -->
    <div class="group bg-white p-5 rounded-lg shadow-lg text-center hover:shadow-xl transition-all duration-300" 
         data-aos="fade-up" data-aos-duration="800" data-aos-delay="1000">
        <div class="overflow-hidden rounded-md border-b-2 border-[#0090D4]">
            <img src="/img/t-3.png" alt=""
                class="w-full aspect-[16/9] object-cover ">
        </div>
        <p class="mt-3 text-black font-medium text-sm md:text-base ">
            Menjadikan anak lebih bisa mengenali bakat diri sendiri serta berdaya saing dengan sportif
        </p>
    </div>
    
    <!-- Card 4 -->
    <div class="group bg-white p-5 rounded-lg shadow-lg text-center hover:shadow-xl transition-all duration-300" 
         data-aos="fade-up" data-aos-duration="800" data-aos-delay="1100">
        <div class="overflow-hidden rounded-md border-b-2 border-[#0090D4]">
            <img src="/img/t-4.jpg" alt=""
                class="w-full aspect-[16/9] object-cover ">
        </div>
        <p class="mt-3 text-black font-medium text-sm md:text-base ">
            Menjadikan anak lebih mandiri dan tidak tergantung pada orang lain
        </p>
    </div>
</div>
        </div>
    </div>
</section>

<!-- visi - misi -->
<section id="visi-misi" class="bg-white pt-8 px-4 pb-8">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="font-bold text-[20px] md:text-[32px] text-[#0090D4] flex items-center justify-center text-center"
            data-aos="fade-down" data-aos-duration="600">
            VISI-MISI
        </h1>

        <p class="font-regular text-sm md:text-[18px] text-black mb-10 w-full max-w-8xl" data-aos="fade-up"
            data-aos-duration="600" data-aos-delay="200">
            Dalam upaya mendukung tumbuh kembang anak secara optimal, TK Pertiwi memiliki visi dan misi yang dirancang
            untuk menciptakan lingkungan belajar yang aman, kreatif, dan inspiratif. Berikut adalah visi dan misi kami
            sebagai landasan utama dalam memberikan pendidikan terbaik bagi anak-anak.
        </p>

        <!-- Visi -->
        <div class="bg-white p-5 rounded-lg shadow-md shadow-[#0090D4] mt-8 mb-10 text-left" data-aos="fade-right"
            data-aos-duration="600" data-aos-delay="400">
            <h3 class="font-bold text-sm md:text-[25px] text-[#0090D4] mb-3">Visi:</h3>
            <p class="text-sm md:text-[18px] text-black">
                Terwujudnya Siswa Yang Berakhlak Mulia, Cerdas, Kreatif Dan Mandiri
            </p>
        </div>

        <!-- Misi -->
        <div class="bg-white p-5 rounded-lg shadow-md shadow-[#0090D4] text-left" data-aos="fade-left"
            data-aos-duration="600" data-aos-delay="600">
            <h3 class="font-bold text-sm md:text-[25px] text-[#0090D4] mb-3">Misi</h3>
            <ul class="text-black text-sm md:text-[18px] list-decimal pl-6 space-y-2">
                <li>Mewujudkan Pendidikan Agama dan Budi Pekerti Secara Terprogram</li>
                <li>Meningkatkan Kecerdasan Anak Melalui Kegiatan Belajar Seraya Bermain</li>
                <li>Memberikan Pengetahuan Yang Berwawasan Untuk Menumbuhkan Bakat Keterampilan Yang Beragam</li>
                <li>Menanamkan Kedisiplinan Kejujuran Dan Tanggung Jawab Melalui Berbagai Macam Kegiatan Main</li>
            </ul>
        </div>
    </div>
</section>

<!-- artikel -->
<section id="artikel" class="artikel min-h-screen py-8">
    <div class="max-w-7xl mx-auto text-center px-4">
        <h2 class="font-bold text-[20px] md:text-[32px] text-[#0090D4]" data-aos="fade-down" data-aos-duration="600">ARTIKEL</h2>
        <p class="font-regular text-sm md:text-[18px] text-black mb-10 mx-auto max-w-4xl"  data-aos="fade-up"
            data-aos-duration="600" data-aos-delay="200">
            Temukan hal menarik seputar TK Pertiwi Grojogan mulai dari pembelajaran yang efektif hingga kegiatan kreatif
            untuk anak-anak.
            Mari bersama-sama menciptakan fondasi pendidikan yang kuat dan menyenangkan bagi anak-anak kita!
        </p>

        @if($articles->count() > 0)
            <div x-data="{ showAll: window.innerWidth >= 1024 ? false : true }" x-init="() => {
                    window.addEventListener('resize', () => {
                        showAll = window.innerWidth < 1024;
                    });
                }">
                <!-- Tampilan Mobile (semua artikel) -->
                <div class="lg:hidden grid grid-cols-2 gap-4">
                    @foreach($articles as $article)
                        <div
                            class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col h-full hover:shadow-xl transition-shadow duration-300">
                            <!-- Gambar Artikel -->
                            <div class="w-full px-4 pt-4 pb-2">
                                <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                                    @if($article->image && $article->image->url)
                                        <img src="{{ asset($article->image->url) }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                    @else
                                        <img src="{{ asset('img/default-article.jpg') }}" alt="Default article image"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                    @endif
                                </div>
                            </div>

                            <!-- Konten Artikel -->
                            <div class="p-4 flex flex-col flex-grow">
                                <div class="text-left">
                                    <h3 class="text-xs font-semibold text-[#0090D4] mb-2 line-clamp-2">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-xs text-gray-700 mb-4 line-clamp-2">
                                        {{ Str::limit(strip_tags($article->content), 100) }}
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('landing.article.detail', $article->id) }}"
                                        class="inline-block bg-[#0090D4] hover:bg-[#007bb3] text-white px-3 py-1 text-xs rounded-lg transition-colors duration-300">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tampilan Desktop (dengan toggle) -->
                <div class="hidden lg:block">
                    <!-- Artikel yang ditampilkan awal (3 pertama) -->
                    <div class="grid grid-cols-3 gap-6">
                        @foreach($articles->take(3) as $article)
                            <div
                                class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col h-full hover:shadow-xl transition-shadow duration-300">
                                <!-- Gambar Artikel -->
                                <div class="w-full px-4 pt-4 pb-2">
                                    <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                                        @if($article->image && $article->image->url)
                                            <img src="{{ asset($article->image->url) }}" alt="{{ $article->title }}"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                        @else
                                            <img src="{{ asset('img/default-article.jpg') }}" alt="Default article image"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                        @endif
                                    </div>
                                </div>

                                <!-- Konten Artikel -->
                                <div class="p-4 flex flex-col flex-grow">
                                    <div class="text-left">
                                        <h3 class="text-sm md:text-base font-semibold text-[#0090D4] mb-2 line-clamp-2">
                                            {{ $article->title }}
                                        </h3>
                                        <p class="text-sm text-gray-700 mb-4 line-clamp-3">
                                            {{ Str::limit(strip_tags($article->content), 100) }}
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="{{ route('landing.article.detail', $article->id) }}"
                                            class="inline-block bg-[#0090D4] hover:bg-[#007bb3] text-white px-4 py-2 text-sm rounded-lg transition-colors duration-300">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Artikel tambahan (sembunyi awal) -->
                    <div x-show="showAll" class="grid grid-cols-3 gap-6 mt-6">
                        @foreach($articles->slice(3) as $article)
                            <div
                                class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col h-full hover:shadow-xl transition-shadow duration-300">
                                <!-- Gambar Artikel -->
                                <div class="w-full px-4 pt-4 pb-2">
                                    <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                                        @if($article->image && $article->image->url)
                                            <img src="{{ asset($article->image->url) }}" alt="{{ $article->title }}"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                        @else
                                            <img src="{{ asset('img/default-article.jpg') }}" alt="Default article image"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 border-b-2 border-[#0090D4]">
                                        @endif
                                    </div>
                                </div>

                                <!-- Konten Artikel -->
                                <div class="p-4 flex flex-col flex-grow">
                                    <div class="text-left">
                                        <h3 class="text-sm md:text-base font-semibold text-[#0090D4] mb-2 line-clamp-2">
                                            {{ $article->title }}
                                        </h3>
                                        <p class="text-sm text-gray-700 mb-4 line-clamp-3">
                                            {{ Str::limit(strip_tags($article->content), 100) }}
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="{{ route('landing.article.detail', $article->id) }}"
                                            class="inline-block bg-[#0090D4] hover:bg-[#007bb3] text-white px-4 py-2 text-sm rounded-lg transition-colors duration-300">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tombol Tampilkan Lebih Banyak (Desktop saja) -->
                    @if($articles->count() > 3)
                        <div class="mt-8 text-center">
                            <button @click="showAll = !showAll"
                                class="bg-[#0090D4] hover:bg-[#007bb3] text-white font-medium py-2 px-6 rounded-lg transition-colors duration-300">
                                <span x-text="showAll ? 'Sembunyikan' : 'Tampilkan Lebih Banyak'"></span>
                                <svg x-show="!showAll" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg x-show="showAll" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500">Belum ada artikel yang tersedia.</p>
            </div>
        @endif
    </div>
</section>
<footer class="bg-white py-4">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Container Maps dengan border top-bottom -->
        <div class="py-6 mb-6">
            <h2 class="font-bold text-[20px] md:text-[32px] text-[#0090D4] flex items-center justify-center text-center">TENTANG KAMI
            </h2>
            <div class="w-full h-[200px] md:h-[450px]">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.590863909551!2d111.86268027484245!3d-7.6194175923959495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784bf5e349dfa9%3A0x311f48f59fab4e95!2sTK%20Pertiwi%20Grojogan!5e0!3m2!1sid!2sid!4v1746017641729!5m2!1sid!2sid"
                    class="w-full h-full border-b-3 border-t-3  border-[#0090D4] " allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Baris kode pos dan kontak -->
        <div class="flex flex-col md:flex-row gap-6 mb-8">
            <!-- Kode Pos di Kiri -->
            <div class="w-full md:w-1/2">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0090D4] mt-1 mr-3 flex-shrink-0"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700">Alamat Lengkap</h4>
                        <p class="text-sm text-gray-600">
                            
                            Grojogan, Kec. Berbek<br>
                            Kab. Nganjuk, Jawa Timur<br>
                            64473
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kontak di Kanan -->
            <div class="w-full md:w-1/2">
                <h3 class="text-lg font-semibold text-[#0090D4] mb-3">Hubungi Kami</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0090D4] mr-3 flex-shrink-0"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <p class="text-sm">(0358) 123456</p>
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0090D4] mr-3 flex-shrink-0"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <p class="text-sm">info@tkpertiwigrojogan.com</p>
                    </div>
                </div>
            </div>
        </div>

        @include('landing.partial.footer')
    </div>
</footer>


       




@include('landing.partial.script')

</body>
</html>