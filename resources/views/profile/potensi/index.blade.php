@include('layouts.headerbar')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-2xl font-bold text-blue-700 mb-8 text-center">Potensi Terbaik Desa Blacanan</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="flex flex-col items-center bg-white rounded-lg shadow p-6">
            <img src="/potensi/pertanian.png" alt="Pertanian" class="w-24 h-24 rounded-full border-4 border-blue-200 mb-4">
            <div class="font-semibold text-lg text-blue-700 mb-2">Pertanian</div>
            <p class="text-gray-600 text-center">Pertanian menjadi sektor utama dengan hasil padi dan palawija yang melimpah.</p>
        </div>
        <div class="flex flex-col items-center bg-white rounded-lg shadow p-6">
            <img src="/potensi/perikanan.png" alt="Perikanan" class="w-24 h-24 rounded-full border-4 border-blue-200 mb-4">
            <div class="font-semibold text-lg text-blue-700 mb-2">Perikanan</div>
            <p class="text-gray-600 text-center">Perikanan air tawar dan tambak menjadi potensi ekonomi masyarakat desa.</p>
        </div>
        <div class="flex flex-col items-center bg-white rounded-lg shadow p-6">
            <img src="/potensi/kerajinan.png" alt="Kerajinan" class="w-24 h-24 rounded-full border-4 border-blue-200 mb-4">
            <div class="font-semibold text-lg text-blue-700 mb-2">Kerajinan</div>
            <p class="text-gray-600 text-center">Kerajinan tangan khas Blacanan menjadi daya tarik dan sumber penghasilan warga.</p>
        </div>
    </div>
</div>
@include('layouts.footer') 