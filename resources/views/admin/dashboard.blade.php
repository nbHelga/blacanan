@extends('admin.layouts.layout')

@section('page_title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="ml-4 text-2xl font-semibold mb-4">Selamat Datang, Admin!</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <div class="w-full bg-[url('/img/motif.png')] bg-cover rounded-t-lg text-white text-center font-bold py-2">Terakhir Aktif</div>
                <div class="text-4xl font-bold mt-4 mb-2">{{ $lastActive ? $lastActive->last_login_at->format('d M Y H:i') : '-' }}</div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <div class="w-full bg-[url('/img/motif.png')] bg-cover rounded-t-lg text-white text-center font-bold py-2">Jumlah Pengunjung</div>
                <div class="text-4xl font-bold mt-4 mb-2">{{ $visitorCount }}</div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <div class="w-full bg-[url('/img/motif.png')] bg-cover rounded-t-lg text-white text-center font-bold py-2">UMKM Terdaftar</div>
                <div class="text-4xl font-bold mt-4 mb-2">{{ $umkmCount }}</div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <div class="w-full bg-[url('/img/motif.png')] bg-cover rounded-t-lg text-white text-center font-bold py-2">Jumlah Konten</div>
                <div class="text-4xl font-bold mt-4 mb-2">{{ $blogCount }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h3 class="text-xl font-bold mb-4">Berita Terbaru</h3>
        <div class="space-y-4">
            @foreach($latestBlogs as $blog)
                <div class="flex justify-between items-center border rounded-lg px-4 py-3">
                    <div>
                        <div class="font-semibold">{{ $blog->judul }}</div>
                        <div class="text-sm text-gray-500">{{ $blog->created_at->format('d F Y') }}</div>
                    </div>
                    <a href="{{ url('/blog/detail/'.$blog->id) }}" class="text-blue-600 font-semibold">Detail</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
