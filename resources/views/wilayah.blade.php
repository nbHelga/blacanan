@extends('layouts.layout')
@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-2xl font-bold mb-4">Wilayah Desa</h1>
    <img src="{{ asset('images/peta-desa.jpg') }}" alt="Peta Desa" class="w-40 h-auto rounded shadow mb-4 float-right ml-4">
    <ul class="mb-4">
        <li><b>Luas Desa:</b> 226 Ha</li>
        <li><b>Koordinat:</b> 109.5863 BT / -6.859873 LS</li>
        <li><b>Tipologi:</b> Pesisir</li>
    </ul>
    <h2 class="font-semibold mt-6 mb-2">Batas Wilayah:</h2>
    <ul class="list-disc ml-6 mb-6">
        <li><b>Utara:</b> Pantai</li>
        <li><b>Selatan:</b> Desa Yosorejo</li>
        <li><b>Timur:</b> Desa Depok</li>
        <li><b>Barat:</b> Desa Tasikrejo</li>
    </ul>
</div>
@endsection