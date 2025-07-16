<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDesa;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::first();
        return view('admin.profil_desa.index', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilDesa::first();
        return view('admin.profil_desa.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilDesa::first();
        $data = $request->except(['statistik', 'mutasi', 'batas', 'peta']);
        $data['statistik'] = json_encode($request->statistik ?? []);
        $data['mutasi'] = json_encode($request->mutasi ?? []);
        $data['batas'] = json_encode($request->batas ?? []);
        if ($request->hasFile('peta')) {
            $file = $request->file('peta');
            $path = $file->store('peta', 'public');
            $data['peta'] = $path;
        }
        $profil->update($data);
        return redirect()->route('admin.profil_desa.index')->with('success', 'Profil desa berhasil diupdate');
    }
}
