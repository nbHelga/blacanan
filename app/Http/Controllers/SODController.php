<?php

namespace App\Http\Controllers;

use App\Models\SOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SODController extends Controller
{
    // Public index
    public function index()
    {
        $sods = SOD::get();
        return view('sod.index', compact('sods'));
    }

    // Admin index
    public function adminIndex()
    {
        // $perPage = $request->get('perPage', 10);
        $sods = SOD::paginate(10);
        return view('admin.sod.index', compact('sods'));
    }

    public function show($id)
    {
        $sod = SOD::findOrFail($id);
        return view('admin.sod.detail', compact('sod'));
    }

    public function create()
    {
        $sod = null; // definisikan variabel kosong
        return view('admin.sod.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            // 'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $sod = new SOD($request->except('gambar'));
        if ($request->hasFile('gambar')) {
            if (isset($sod) && $sod->gambar && Storage::disk('public')->exists($sod->gambar)) {
                Storage::disk('public')->delete($sod->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "sod/{$dateFolder}";

            // Buat folder kalau belum ada
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs("{$folder}", $originalName, 'public');

            // Perbaikan: simpan ke $content
            $sod->gambar = "{$folder}/{$originalName}";
        }
        $sod->status = $request->status ?? false;
        $sod->save();

        return redirect()->route('admin.sod.index')->with('success', 'SOD berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $sod = SOD::findOrFail($id);
        $sod->fill($request->except('gambar'));
        if ($request->hasFile('gambar')) {
            if (isset($sod) && $sod->gambar && Storage::disk('public')->exists($sod->gambar)) {
                Storage::disk('public')->delete($sod->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "sod/{$dateFolder}";

            // Buat folder kalau belum ada
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs("{$folder}", $originalName, 'public');

            // Perbaikan: simpan ke $content
            $sod->gambar = "{$folder}/{$originalName}";
        }
        $sod->status = $request->status ?? false;
        $sod->save();

        return redirect()->route('admin.sod.index')->with('success', 'SOD berhasil diupdate');
    }

    public function edit($id)
    {
        $sod = SOD::findOrFail($id);
        return view('admin.sod.form', compact('sod'));
    }

    public function destroy($id)
    {
        $sod = SOD::findOrFail($id);
        if ($sod->gambar && file_exists(public_path($sod->gambar))) {
            unlink(public_path($sod->gambar));
        }
        $sod->delete();
        return redirect()->route('admin.sod.index')->with('success', 'SOD berhasil dihapus');
    }

    public function toggle($id)
    {
        $sod = SOD::findOrFail($id);
        $sod->status = !$sod->status;
        $sod->save();
        return redirect()->route('admin.sod.detail', $sod->id)
            ->with('success', 'Status konten berhasil diubah.');
    }
}
