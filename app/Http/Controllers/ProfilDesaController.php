<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use App\Models\Statistik;
use App\Models\Mutasi;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            $profil = new ProfilDesa([
                'deskripsi' => '',
                'visi' => '',
                'misi' => '',
                'peta' => null
            ]);
        }
        $statistik = Statistik::orderBy('urutan')->get();
        $mutasi = Mutasi::orderBy('urutan')->get();
        return view('admin.profil_desa.index', compact('profil', 'statistik', 'mutasi'));
    }

    public function edit()
    {
        $profil = ProfilDesa::first();
        if (!$profil) {
            $profil = new ProfilDesa([
                'deskripsi' => '',
                'visi' => '',
                'misi' => '',
                'peta' => null
            ]);
        }
        $statistik = Statistik::orderBy('urutan')->get();
        $mutasi = Mutasi::orderBy('urutan')->get();
        return view('admin.profil_desa.edit', compact('profil', 'statistik', 'mutasi'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'peta' => 'nullable|image|max:2048',
        ]);

        $profil = ProfilDesa::first();
        if (!$profil) {
            $profil = new ProfilDesa();
        }

        $data = $request->except(['peta', 'statistik', 'mutasi']);

        if ($request->hasFile('peta')) {
            // Delete old image if exists
            if ($profil->peta && Storage::disk('public')->exists($profil->peta)) {
                Storage::disk('public')->delete($profil->peta);
            }

            $file = $request->file('peta');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "peta/{$dateFolder}";

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $data['peta'] = "{$folder}/{$originalName}";
        }

        $profil->fill($data);
        $profil->save();

        // Update statistik data if provided
        if ($request->has('statistik')) {
            foreach ($request->statistik as $id => $stat) {
                if (isset($stat['jumlah'])) {
                    Statistik::where('id', $id)->update(['jumlah' => $stat['jumlah']]);
                }
            }
        }

        // Update mutasi data if provided
        if ($request->has('mutasi')) {
            foreach ($request->mutasi as $id => $mut) {
                $updateData = [];
                if (isset($mut['pindah_laki'])) $updateData['pindah_laki'] = $mut['pindah_laki'];
                if (isset($mut['pindah_perempuan'])) $updateData['pindah_perempuan'] = $mut['pindah_perempuan'];
                if (isset($mut['datang_laki'])) $updateData['datang_laki'] = $mut['datang_laki'];
                if (isset($mut['datang_perempuan'])) $updateData['datang_perempuan'] = $mut['datang_perempuan'];

                if (!empty($updateData)) {
                    Mutasi::where('id', $id)->update($updateData);
                }
            }
        }

        return redirect()->route('admin.profil_desa.index')->with('success', 'Profil desa berhasil diupdate');
    }
}
