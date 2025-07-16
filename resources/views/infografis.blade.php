{{-- resources/views/infografis.blade.php --}}
@extends('layouts.layout')
@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Infografis Desa Blacanan</h1>
    <div x-data="{ tab: 'penduduk' }">
        <div class="flex space-x-4 mb-8">
            <button @click="tab='penduduk'" :class="tab==='penduduk' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Penduduk</button>
            <button @click="tab='dusun'" :class="tab==='dusun' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Dusun</button>
            <button @click="tab='pendidikan'" :class="tab==='pendidikan' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Pendidikan</button>
            <button @click="tab='perkawinan'" :class="tab==='perkawinan' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Perkawinan</button>
            <button @click="tab='agama'" :class="tab==='agama' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Agama</button>
            <button @click="tab='sarana'" :class="tab==='sarana' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-4 py-2 rounded">Sarana</button>
        </div>
        <div x-show="tab==='penduduk'">
            @include('infografis.partials.penduduk', ['data' => $dataPenduduk])
        </div>
        <div x-show="tab==='dusun'">
            @include('infografis.partials.dusun', ['data' => $dataDusun])
        </div>
        <div x-show="tab==='pendidikan'">
            @include('infografis.partials.pendidikan', ['data' => $dataPendidikan])
        </div>
        <div x-show="tab==='perkawinan'">
            @include('infografis.partials.perkawinan', ['data' => $dataPerkawinan])
        </div>
        <div x-show="tab==='agama'">
            @include('infografis.partials.agama', ['data' => $dataAgama])
        </div>
        <div x-show="tab==='sarana'">
            @include('infografis.partials.sarana', ['data' => $dataSarana])
        </div>
    </div>
</div>
@endsection