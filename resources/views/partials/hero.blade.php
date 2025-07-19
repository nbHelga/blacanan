<section class="relative w-full min-h-[450px] flex items-center justify-center overflow-hidden mt-12 max-w-6xl mx-auto px-16 group" id="hero-slider">
    @foreach($contents as $i => $content)
        <div
            class="absolute inset-0 transition-opacity duration-700 ease-in-out slide {{ $i !== 0 ? 'hidden' : '' }}"
            @if($content->tipe === 'video' && $content->video)
                style="background: #000;"
            @else
                style="background-image: url('{{ $content->gambar ? asset('storage/'.$content->gambar) : asset($content->gambar) }}'); background-size: cover; background-position: center center; will-change: background-position;"
            @endif
            aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"
        >
            @if($content->tipe === 'video' && $content->video)
                <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover">
                    <source src="{{ asset('storage/'.$content->video) }}" type="video/mp4">
                </video>
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="prose relative z-10 w-full flex flex-col items-center justify-center py-20 px-4 text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">{{ $content->judul }}</h1>
                <div class="w-24 h-1 bg-green-400 mx-auto mb-6"></div>
                <div class="text-lg text-white max-w-2xl mx-auto mb-8">{!! $content->deskripsi !!}</div>
            </div>
        </div>
    @endforeach

    <button onclick="prevSlide()" aria-label="Previous Slide"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow hover:bg-opacity-100 z-20 transition-all duration-300 opacity-0 group-hover:opacity-100">
        <img src="{{ asset('arrow-right.png') }}" alt="Previous" class="w-6 h-6 rotate-180">
    </button>
    <button onclick="nextSlide()" aria-label="Next Slide"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 rounded-full p-3 shadow hover:bg-opacity-100 z-20 transition-all duration-300 opacity-0 group-hover:opacity-100">
        <img src="{{ asset('arrow-right.png') }}" alt="Next" class="w-6 h-6">
    </button>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('#hero-slider .slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('hidden');
                slide.setAttribute('aria-hidden', 'false');
            } else {
                slide.classList.add('hidden');
                slide.setAttribute('aria-hidden', 'true');
            }
        });
    }

    window.prevSlide = function () {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    };

    window.nextSlide = function () {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    };

    // Parallax background on scroll
    window.addEventListener('scroll', () => {
        slides.forEach(slide => {
            if (!slide.classList.contains('hidden')) {
                const rect = slide.getBoundingClientRect();
                const offset = (rect.top / window.innerHeight) * 50;
                slide.style.backgroundPosition = `center ${offset}%`;
            }
        });
    });
});
</script>