<?php

namespace App\Http\Controllers;

use App\Models\Kependudukan;
use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\Statistik;

class KependudukanController extends Controller
{
    // Public view untuk halaman kependudukan
    public function index()
    {
        $kependudukans = Kependudukan::all();
        $mutasi = Mutasi::orderBy('urutan')->get();
        $statistik = Statistik::orderBy('urutan')->get();

        // Jika tidak ada data, buat data default
        if ($kependudukans->isEmpty()) {
            $this->createDefaultData();
            $kependudukans = Kependudukan::all();
        }

        return view('kependudukan', compact('kependudukans', 'mutasi', 'statistik'));
    }

    // Method untuk membuat data default jika belum ada
    private function createDefaultData()
    {
        $defaultData = [
            ['nama' => 'Total Penduduk', 'jumlah' => 0],
            ['nama' => 'Laki-laki', 'jumlah' => 0],
            ['nama' => 'Perempuan', 'jumlah' => 0],
            ['nama' => 'Jumlah Stunting', 'jumlah' => 0],
            ['nama' => 'Balita', 'jumlah' => 0],
            ['nama' => 'Kanak-kanak', 'jumlah' => 0],
            ['nama' => 'Remaja', 'jumlah' => 0],
            ['nama' => 'Dewasa', 'jumlah' => 0],
            ['nama' => 'Lansia', 'jumlah' => 0],
            ['nama' => 'Tidak sekolah/belum tamat SD', 'jumlah' => 0],
            ['nama' => 'Tamat SD/sederajat', 'jumlah' => 0],
            ['nama' => 'Tamat SLTP/sederajat', 'jumlah' => 0],
            ['nama' => 'Tamat SLTA/sederajat', 'jumlah' => 0],
            ['nama' => 'Tamat S-1/sederajat', 'jumlah' => 0],
            ['nama' => 'Pelajar', 'jumlah' => 0],
            ['nama' => 'Ibu Rumah Tangga', 'jumlah' => 0],
            ['nama' => 'Buruh Harian Lepas', 'jumlah' => 0],
            ['nama' => 'Belum Bekerja', 'jumlah' => 0],
            ['nama' => 'Buruh Tani', 'jumlah' => 0],
            ['nama' => 'Petani', 'jumlah' => 0],
            ['nama' => 'Wiraswasta', 'jumlah' => 0],
            ['nama' => 'Pedagang', 'jumlah' => 0],
            ['nama' => 'PNS', 'jumlah' => 0],
        ];

        foreach ($defaultData as $data) {
            Kependudukan::create($data);
        }
    }

    // Admin methods
    public function adminIndex()
    {
        $kependudukans = Kependudukan::all();
        return view('admin.kependudukan.index', compact('kependudukans'));
    }

    public function create()
    {
        return view('admin.kependudukan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        Kependudukan::create($request->all());

        return redirect()->route('admin.kependudukan.index')
            ->with('success', 'Data kependudukan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kependudukan = Kependudukan::findOrFail($id);
        return view('admin.kependudukan.form', compact('kependudukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        $kependudukan = Kependudukan::findOrFail($id);
        $kependudukan->update($request->all());

        return redirect()->route('admin.kependudukan.index')
            ->with('success', 'Data kependudukan berhasil diupdate');
    }

    public function destroy($id)
    {
        $kependudukan = Kependudukan::findOrFail($id);
        $kependudukan->delete();

        return redirect()->route('admin.kependudukan.index')
            ->with('success', 'Data kependudukan berhasil dihapus');
    }

    // Method untuk update semua data sekaligus
    public function updateAll(Request $request)
    {
        $request->validate([
            'kependudukan.*.jumlah' => 'required|integer|min:0',
        ]);

        foreach ($request->kependudukan as $id => $data) {
            Kependudukan::where('id', $id)->update([
                'jumlah' => $data['jumlah']
            ]);
        }

        return redirect()->route('admin.kependudukan.index')->with('success', 'Semua data kependudukan berhasil diperbarui');
    }
}
