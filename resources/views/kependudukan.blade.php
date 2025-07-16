@extends('layouts.layout')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-2xl font-bold mb-4">Kependudukan & Pendidikan</h1>
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Sekolah" class="w-40 h-auto rounded shadow mb-4 float-right ml-4">
    <ul class="mb-6">
        <li><b>Jumlah Sekolah Formal:</b> 3</li>
        <ul class="list-disc ml-6">
            <li>TK Puspa Bangsa</li>
            <li>SD Negeri 1 Blacanan</li>
            <li>SD Negeri 2 Blacanan</li>
        </ul>
    </ul>
    <ul class="mb-6">
        <li><b>Jumlah Tempat Ibadah:</b></li>
        <ul class="list-disc ml-6">
            <li>Masjid: 1</li>
            <li>Mushola: 6</li>
        </ul>
    </ul>
    <ul class="mb-6">
        <li><b>Jumlah Stunting:</b> 11 anak</li>
    </ul>
</div>
@endsection