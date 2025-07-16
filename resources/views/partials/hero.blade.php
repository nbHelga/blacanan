<section class="relative w-full min-h-[450px] flex items-center justify-center overflow-hidden mt-12 max-w-6xl mx-auto px-16" id="hero-slider">
    @foreach($contents as $i => $content)
        <div 
            class="absolute inset-0 transition-opacity duration-700 ease-in-out slide {{ $i !== 0 ? 'hidden' : '' }}"
            style="background-image: url('{{ asset($content->gambar) }}'); background-size: cover; background-position: center center; will-change: background-position;"
            aria-hidden="{{ $i === 0 ? 'false' : 'true' }}"
        >
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="prose relative z-10 w-full flex flex-col items-center justify-center py-20 px-4 text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">{{ $content->judul }}</h1>
                <div class="w-24 h-1 bg-green-400 mx-auto mb-6"></div>
                <div class="text-lg text-white max-w-2xl mx-auto mb-8">{!! $content->deskripsi !!}</div>
            </div>
        </div>
    @endforeach

    <button onclick="prevSlide()" aria-label="Previous Slide"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-blue-600 text-white rounded-full p-3 shadow hover:bg-blue-800 text-2xl z-20 transition duration-300">
        &larr;
    </button>
    <button onclick="nextSlide()" aria-label="Next Slide"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-blue-600 text-white rounded-full p-3 shadow hover:bg-blue-800 text-2xl z-20 transition duration-300">
        &rarr;
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