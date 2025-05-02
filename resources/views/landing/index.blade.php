 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>TK Pertiwi Grojogan</title>
</head>
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

    <!-- Arrows (unchanged) -->
    <button id="prev"
        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-2 rounded-full shadow-md z-20">
        <i class="fas fa-chevron-left text-xl"></i>
    </button>
    <button id="next"
        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/60 hover:bg-white text-[#0090D4] p-2 rounded-full shadow-md z-20">
        <i class="fas fa-chevron-right text-xl"></i>
    </button>
</section>


<!-- sekilas -->
<section id="sekilas" class="sekilas min-h-screen bg-[#0090D4]">
    <div class="container mx-auto pt-8 px-4">
        <h1 class="font-bold text-[20px] md:text-[32px] text-white flex items-center justify-center text-center">
            PENGENALAN
        </h1>
        <p class="font-regular text-[14px] md:text-[18px] text-center text-white flex justify-center px-6 md:px-20">
            TK Pertiwi Grojogan adalah suatu sarana pembelajaran awal anak, yang dimana anak-anak dapat mengembangkan
            kemampuan di berbagai bidang dan membantu karakter anak yang berakhlak dan berbudi luhur.
        </p>

        <h1 class="font-bold text-[20px] md:text-[32px] text-white flex items-center justify-center text-center mt-4">
            TUJUAN
        </h1>
        <p class="font-regular text-[14px] md:text-[18px] text-center text-white flex justify-center px-6 md:px-10">
            Pembelajaran di TK Pertiwi Grojogan memiliki beberapa tujuan
        </p>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-2 p-4 md:p-8">
            <div class="bg-white p-5 rounded-lg shadow-lg text-center">
                <img src="/img/t-1.png" alt=""
                    class="w-full aspect-[16/9] object-cover rounded-md border-b-2 border-[#0090D4]">
                <p class="mt-3 text-black font-medium text-sm md:text-base">
                    Terbentuknya peserta didik yang berakhlak mulia dan berbudi pekerti yang luhur
                </p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg text-center">
                <img src="/img/t-2.png" alt=""
                    class="w-full aspect-[16/9] object-cover rounded-md border-b-2 border-[#0090D4]">
                <p class="mt-3 text-black font-medium text-sm md:text-base">
                    Terwujudnya siswa yang cerdas berkualitas dan berkembang sesuai usianya
                </p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg text-center">
                <img src="/img/t-3.png" alt=""
                    class="w-full aspect-[16/9] object-cover rounded-md border-b-2 border-[#0090D4]">
                <p class="mt-3 text-black font-medium text-sm md:text-base">
                    Menjadikan anak lebih bisa mengenali bakat diri sendiri serta berdaya saing dengan sportif
                </p>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg text-center">
                <img src="" alt="" class="w-full h-40 object-cover rounded-md border-b-2 border-[#0090D4]">
                <p class="mt-3 text-black font-medium text-sm md:text-base">
                    Menjadikan anak lebih mandiri dan tidak tergantung pada orang lain
                </p>
            </div>
        </div>
    </div>
</section>


<!-- visi - misi -->
<section id="visi-misi" class="bg-white pt-8 px-4 pb-8">
    <div class="max-w-7xl mx-auto text-center">
       <h1 class="font-bold text-[20px] md:text-[32px] text-[#0090D4] flex items-center justify-center text-center">
            VISI-MISI
        </h1>

        <p class="font-regular text-sm md:text-[18px] text-black mb-10 w-full max-w-8xl">
            Dalam upaya mendukung tumbuh kembang anak secara optimal, TK Pertiwi memiliki visi dan misi yang dirancang
            untuk menciptakan lingkungan belajar yang aman, kreatif, dan inspiratif. Berikut adalah visi dan misi kami
            sebagai
            landasan utama dalam memberikan pendidikan terbaik bagi anak-anak.
        </p>

        <!-- Visi -->
        <div class="bg-white p-5 rounded-lg shadow-lg shadow-[#0090D4] mt-8 mb-10 text-left">
            <h3 class="font-bold text-sm md:text-[25px] text-[#0090D4] mb-3">Visi:</h3>
            <p class="text-sm md:text-[18px] text-black">
                Terwujudnya Siswa Yang Berakhlak Mulia, Cerdas, Kreatif Dan Mandiri
            </p>
        </div>

        <!-- Misi -->
        <div class="bg-white p-5 rounded-lg shadow-lg shadow-[#0090D4] text-left">
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
<section id="artikel" class="artikel min-h-screen">
  <div class="max-w-7xl mx-auto text-center pt-8 px-4">
    <h2 class="font-bold text-[20px] md:text-[32px] text-[#0090D4] flex items-center justify-center text-center">ARTIKEL</h2>
    <p class="font-regular text-sm md:text-[18px] text-black mb-10 w-full max-w-8xl">
      Temukan hal menarik seputar TK Pertiwi Grojogan mulai dari pembelajaran yang efektif hingga kegiatan kreatif untuk anak anak. 
      Mari bersama-sama menciptakan fondasi pendidikan yang kuat dan menyenangkan bagi anak-anak kita!
    </p>

   <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
  <!-- Card -->
  <div class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col">
    <div class="w-full px-4 pt-4 pb-2">
      <div class="aspect-[16/9] w-full">
        <img src="img/artikel.png" alt="Artikel 1" class="w-full h-full object-cover rounded-lg border-b-2 border-[#0090D4]">
      </div>
    </div>
  
    <div class="p-4 flex flex-col flex-grow justify-between">
      <div class="text-left">
        <h3 class="text-sm sm:text-base md:text-lg font-semibold text-[#0090D4] mb-2">
          Belajar Sambil Bermain
        </h3>
        <p class="text-xs sm:text-sm text-gray-700 mb-4">
          Metode belajar interaktif untuk meningkatkan kreativitas anak usia dini.
        </p>
      </div>
      <div class="flex justify-center">
        <a href="#"
          class="bg-[#0090D4] text-white px-3 py-1 sm:px-4 sm:py-2 text-xs sm:text-sm rounded-lg hover:bg-[#007bb3]">
          Selengkapnya
        </a>
      </div>
    </div>
  </div>      
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