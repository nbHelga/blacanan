@extends('layouts.layout')
@section('content')

<div class="px-6 pt-4 md:px-12 lg:px-20" x-data="{ kategori: 'all' }">
  {{-- <h1 class="text-3xl font-bold mb-4">Berita Terkini</h1> --}}

  {{-- Tabs kategori --}}
  <div class="mt-8 mb-4 border-b border-gray-200">
    <ul class="flex flex-wrap space-x-4 text-sm font-semibold">
      <li>
        <button
          @click="kategori = 'all'"
          :class="kategori === 'all' ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent'"
          class="px-3 py-2">
          All
        </button>
      </li>
      @foreach ($categories as $category)
        <li>
          <button
            @click="kategori = '{{ $category->kategori }}'"
            :class="kategori === '{{ $category->kategori }}' ? 'text-blue-600 border-b-2 border-blue-600' : 'hover:text-blue-600 hover:border-blue-600 border-b-2 border-transparent'"
            class="px-3 py-2">
            {{ ucfirst($category->kategori) }}
          </button>
        </li>
      @endforeach
    </ul>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($blogs->chunk(ceil($blogs->count()/2)) as $chunk)
        <div class="space-y-8">
            @foreach($chunk as $blog)
                <template x-if="kategori === 'all' || kategori === '{{ $blog->kategori }}'">
                    <a href="{{ url('blog/detail/'.$blog->id) }}" class="flex bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="w-48 h-40 flex-shrink-0 bg-gray-200 flex items-center justify-center">
                          @if ($blog->images->count() > 0)
                            <img src="{{ asset('storage/' . $blog->images->first()->gambar) }}" alt="{{ $blog->judul }}" class="object-cover w-full h-full">
                          @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">Tidak ada gambar</div>
                          @endif
                      </div>
                        <div class="p-6 flex flex-col justify-between">
                            <div>
                            <div class="text-sm text-gray-500 mb-1">Kategori: {{ $blog->kategori }}</div>
                            <div class="text-xl font-bold text-gray-900 mb-2">{{ $blog->judul }}</div>
                            <div class="text-gray-600 line-clamp-3">{{ Str::limit(strip_tags($blog->deskripsi), 120, '...') }}</div>
                            </div>
                            <div class="text-xs text-gray-400 mt-4">Tanggal: {{ $blog->created_at->format('d M Y') }}</div>
                        </div>
                    </a>
                </template>
            @endforeach
        </div>
    @endforeach
  </div>
</div>
@endsection
