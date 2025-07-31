@extends('layouts.layout')

@section('content')

{{-- Section Video Selamat Datang --}}
<section class="relative w-full min-h-screen flex items-center justify-center text-center overflow-hidden">
    <video autoplay loop muted playsinline 
        class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="{{ asset('profilvideo.mp4') }}" type="video/mp4">
        Browser Anda tidak mendukung video.
    </video>
    <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

  <div class="relative z-20 px-4">
    <h2 class="text-2xl md:text-4xl font-semibold text-white mb-6 drop-shadow-lg font-poppins">
      Selamat Datang!
    </h2>
    <h3 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">
      Desa Blacanan
    </h3>
    <a href="https://www.youtube.com/watch?v=mzbJXdkYseM" 
       target="_blank" rel="noopener noreferrer"
       class="inline-block px-8 py-3 bg-green-500 text-white rounded-full font-semibold hover:bg-green-600 transition duration-300">
      Go Detail
    </a>
  </div>
</section>

<!-- HERO/SLIDER SECTION -->
{{-- <section class=""> --}}
    @include('partials.hero')
{{-- </section> --}}

<section class="py-8 pt-4 mt-8">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Pelayanan Desa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="/kependudukan" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center hover:scale-105 transition">
                <img src="civilian.png" class="w-16 h-16 mb-2" alt="Kependudukan">
                <span class="font-semibold">Kependudukan</span>
            </a>
            <a href="/wilayah" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center hover:scale-105 transition">
                <img src="letter.png" class="w-16 h-16 mb-2" alt="Wilayah">
                <span class="font-semibold">Surat-Menyurat</span>
            </a>
            {{-- <a href="/sarana" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center hover:scale-105 transition">
                <img src="infografis.png" class="w-16 h-16 mb-2" alt="Sarana">
                <span class="font-semibold">Infografis</span>
            </a> --}}
            {{-- <a href="/umkm" class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center hover:scale-105 transition">
                <img src="/images/layanan-umkm.png" class="w-16 h-16 mb-2" alt="UMKM">
                <span class="font-semibold">UMKM</span>
            </a> --}}
        </div>
    {{-- </div> --}}
</section>

<!-- UMKM SECTION -->
<section class="mt-16 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="rounded-lg shadow p-8" style="background-color: #008080 !important;">
            <h2 class="text-4xl font-bold text-black text-center mb-10">Potensi Terbaik <span class="text-white">Desa Blacanan</span></h2>
            <div class="w-24 h-1 bg-gray-500 mx-auto mb-10" style="background-color: #d3d3d3"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($umkms as $umkm)
                <a href="{{ url('umkm/detail/'.$umkm->id) }}" class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                    <div class="w-36 h-36 rounded-full bg-[#008080] flex items-center justify-center mb-4 overflow-hidden border-4 border-white">
                        <img src="{{ 'storage/'.$umkm->gambar }}" alt="{{ $umkm->nama }}" class="object-cover w-32 h-32 rounded-full">
                    </div>
                    <div class="font-bold text-xl text-gray-600 mb-2 text-center">{{ $umkm->nama }}</div>
                    <p class="text-gray-800 text-center">
                    {{ Str::limit(strip_tags($umkm->deskripsi), 100, '...') }}
                </p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- KEBUDAYAAN SECTION -->
<section class="py-16 mt">
    <div class="max-w-6xl mx-auto px-4">
        <div class="rounded-lg shadow p-8" style="background-color: #3da58e !important;">
            <h2 class="text-4xl font-bold text-black text-center mb-10">Berkembang <span class="text-white">Bersama</span></h2>
            <div class="w-24 h-1 mx-auto mb-10" style="background-color: #d3d3d3"> </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @foreach($budayas as $budaya)
                <a href="{{ url('budaya/detail/'.$budaya->id) }}" class="bg-gray-100 rounded-lg shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300">
                    <div class="w-36 h-36 bg-gray-700 rounded mb-4 overflow-hidden flex items-center justify-center">
                        <img src="{{ 'storage/'.$budaya->gambar }}" alt="{{ $budaya->nama ?? $budaya->judul }}" class="object-cover w-full h-full">
                    </div>
                    <div class="font-bold text-lg text-gray-800 mb-1 text-center">{{ $budaya->nama ?? $budaya->judul }}</div>
                    <div class="text-gray-600 text-center text-sm">{{ $budaya->kategori ?? $budaya->subjudul }}</div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- STRUKTUR ORGANISASI SECTION -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="rounded-lg shadow p-8" style="background-color: #237750 !important;">
            <h2 class="text-4xl font-bold text-white text-center mb-10">Struktur Organisasi <span class="text-white">Desa</span></h2>
            <div class="w-24 h-1 mx-auto mb-10" style="background-color: #d3d3d3"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($sods as $sod)
                <a href="{{ url('sod/detail/'.$sod->id) }}" class="bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center border border-green-400 hover:scale-105 transition-transform duration-300">
                    <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center mb-4 overflow-hidden border-4 border-green-400">
                        <img src="{{'storage/'.$sod->gambar }}" alt="{{ $sod->nama }}" class="object-cover w-20 h-20 rounded-full">
                    </div>
                    {{-- <p class="text-gray-300 text-center mb-4">{{ $sod->deskripsi }}</p> --}}
                    <div class="font-bold text-white text-lg">{{ $sod->nama }}</div>
                    <div class="text-green-400 text-sm font-semibold">{{ $sod->jabatan }}</div>
                </a>
                @endforeach
            </div>
            <div class="flex justify-center mt-8 pt-8">
                <a href="/sod" class="inline-block px-6 py-4 bg-[#2ecc71] text-white rounded-full font-semibold hover:bg-green-700 transition">Lihat Lebih Banyak</a>
            </div>
        </div>
    </div>
</section>

<!-- BLOG SECTION: Parallax Vertical Slider -->
{{-- <section class="bg-[#101570] py-16 mt-8"> --}}
<section class="py-16 mt-4" x-data="{ kategori: 'all' }">
  <div class="max-w-6xl mx-auto px-4">
    {{-- <div class="shadow p-8"> --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green-800 text-center mb-10 tracking-wider">
        KATEGORI BERITA
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($blogs as $blog)
        <template x-if="kategori === 'all' || kategori === '{{ $blog->kategori }}'">
            <a href="{{ url('blog/detail/'.$blog->id) }}"
            class="block rounded-lg overflow-hidden shadow-lg bg-white hover:scale-105 transition-transform duration-300">
            <div class="h-56 bg-gray-200 relative">
                @if($blog->images->count() > 0)
                    <img src="{{ asset('storage/'.$blog->images->first()->gambar) }}" alt="{{ $blog->judul }}"
                         class="object-cover w-full h-full absolute top-0 left-0 opacity-80">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
            </div>
            <div class="p-4 bg-white relative z-10">
                <div class="text-lg font-semibold text-gray-800 mb-1">{{ $blog->kategori ?? 'Berita Desa' }}</div>
                <div class="text-xl font-bold text-gray-900 leading-tight mb-2">{{ $blog->judul }}</div>
                <div class="text-gray-600 line-clamp-3">{{ Str::limit(strip_tags($blog->deskripsi), 100, '...') }}</div>
            </div>
            </a>
        </template>
        @endforeach
        {{-- </div> --}}
    </div>
  </div>
  <div class="flex justify-center mt-8 pt-8">
    <a href="/blog" class="inline-block px-6 py-4 bg-[#2ecc71] text-white rounded-full font-semibold hover:bg-green-700 transition">Lihat Lebih Banyak</a>
</div>
</section>

@endsection
