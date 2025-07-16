@extends('layouts.layout')
@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8 mt-8">
    <h1 class="text-2xl font-bold mb-4">Sarana & Prasarana Desa</h1>
    <img src="{{ asset('images/sarana.jpg') }}" alt="Sarana Desa" class="w-40 h-auto rounded shadow mb-4 float-right ml-4">
    <ul class="mb-4">
        <li><b>Prasarana Kesehatan:</b> Polindes 1</li>
        <li><b>Sarana Kesehatan:</b></li>
        <ul class="list-disc ml-6">
            <li>Dukun bersalin terlatih: 1</li>
            <li>Bidan: 1</li>
        </ul>
        <li><b>Pamsimas:</b> 3</li>
        <ul class="list-disc ml-6">
            <li>Keburan 1</li>
            <li>Blacanan 1</li>
            <li>Blacanan 2</li>
        </ul>
        <li><b>Badan Usaha Milik Desa:</b> 1 (Bumdes Sumber Harapan)</li>
    </ul>
</div>
@endsection