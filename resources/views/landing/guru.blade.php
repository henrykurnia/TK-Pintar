<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>Tk Pertiwi Grojogan</title>
    <style>
        .teacher-card.hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">

    @include('landing.partial.navbar')

    <section class="guru min-h-screen overflow-hidden pt-10">
        <div class="max-w-7xl mx-auto text-center pt-8 px-4">
            <h2
                class="font-bold text-[20px] md:text-[32px] text-[#0090D4] flex items-center justify-center text-center">
                GURU & STAFF</h2>
            <p class="font-regular text-sm md:text-[18px] text-black mb-10">
                Kami percaya bahwa pendidikan yang berkualitas berawal dari tenaga pendidik dan staff yang berdedikasi.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4" id="teachers-container">
                @foreach($teachers as $key => $teacher)
                    <div
                        class="teacher-card {{ $key >= 8 ? 'hidden' : '' }} bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col">
                        <div class="w-full px-4 pt-4 pb-2">
                            <div class="aspect-[3/4] w-full">
                                @if($teacher->photo_path)
                                    <img src="{{ asset($teacher->photo_path) }}" alt="{{ $teacher->name }}"
                                        class="w-full h-full object-cover rounded-lg border-b-3 border-[#0090D4]"
                                        loading="lazy">
                                @else
                                    <div
                                        class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg border-b-2 border-[#0090D4]">
                                        <i class="fas fa-user text-4xl text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow justify-between text-center">
                            <h3 class="text-sm sm:text-base md:text-lg font-semibold text-[#0090D4] mb-1">
                                {{ $teacher->name }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-700">{{ $teacher->position ?? '-' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($teachers->count() > 4)
                <div class="mt-8">
                    <button id="load-more-btn"
                        class="px-6 py-2 bg-[#0090D4] text-white rounded-lg hover:bg-[#1b7a72] transition-colors duration-300">
                        Tampilkan Lebih Banyak
                    </button>
                </div>
            @endif
        </div>
    </section>

    <footer class="bg-white py-8">
        @include('landing.partial.footer')
    </footer>

    @include('landing.partial.script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loadMoreBtn = document.getElementById('load-more-btn');
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function () {
                    // Show all hidden teacher cards
                    const hiddenCards = document.querySelectorAll('.teacher-card.hidden');
                    hiddenCards.forEach(card => {
                        card.classList.remove('hidden');
                    });

                    // Hide the load more button after showing all
                    loadMoreBtn.style.display = 'none';
                });
            }
        });
    </script>

</body>

</html>