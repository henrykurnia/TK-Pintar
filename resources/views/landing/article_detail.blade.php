<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>{{ $article->title }} | TK Pertiwi Grojogan</title>
</head>
<style>
    .prose {
        line-height: 1.6;
    }

    .prose p {
        margin-bottom: 1rem;
        font-size: 1rem;
        /* Ukuran dasar untuk desktop */
    }

    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }

    .prose ul,
    .prose ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    /* Responsive typography */
    .article-title {
        font-size: 1.5rem;
        /* Default untuk mobile */
        line-height: 1.3;
    }

    .article-content {
        font-size: 0.9rem;
        /* Sedikit lebih kecil untuk mobile */
    }

    /* Tambahkan ini jika navbar fixed */
    body {
        padding-top: 4rem;
        /* Sesuaikan dengan tinggi navbar */
    }

    /* Media queries untuk layar yang lebih besar */
    @media (min-width: 768px) {
        .article-title {
            font-size: 2rem;
            /* Lebih besar di desktop */
        }

        .article-content {
            font-size: 1rem;
            /* Kembali ke ukuran normal di desktop */
        }

        body {
            padding-top: 6rem;
            /* Sesuaikan dengan tinggi navbar di desktop */
        }
    }
</style>

<body class="bg-gray-100">
    @include('landing.partial.navbar')

    <section class="py-6">
        <div class="max-w-4xl mx-auto px-4">
            <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Gambar Artikel -->
                @if($article->image && $article->image->url)
                    <div class="w-full h-48 md:h-96 overflow-hidden">
                        <img src="{{ asset($article->image->url) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif

                <!-- Konten Artikel -->
                <div class="p-5 md:p-8">
                    <h1 class="article-title font-bold text-[#0090D4] mb-3 md:mb-4">
                        {{ $article->title }}
                    </h1>

                    <div class="flex items-center text-gray-500 text-xs md:text-sm mb-4 md:mb-6">
                        <span>
                            Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <div class="prose max-w-none text-gray-700 article-content">
                        {!! $article->content !!}
                    </div>

                    <div class="mt-6 md:mt-8">
                        <a href="{{ route('landing.home') }}#artikel"
                            class="inline-flex items-center text-[#0090D4] hover:text-[#007bb3] text-sm md:text-base">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    @include('landing.partial.footer')
    @include('landing.partial.script')
</body>

</html>