<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    public function index()
    {
        $umkms = UMKM::get();
        return view('umkm.index', compact('umkms'));
    }

    public function show($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('umkm.detail', compact('umkm'));
    }
    
    public function adminIndex()
    {
        // $perPage = $request->get('perPage', 10);
        $umkms = UMKM::paginate(10);
        return view('admin.umkm.index', compact('umkms'));
    }

    public function adminShow($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('admin.umkm.detail', compact('umkm'));
    }

    public function create()
    {
        $umkm = null;
        return view('admin.umkm.form', compact('umkm'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $umkm = new UMKM($request->except('gambar'));
        
        // ...existing code...
        if ($request->hasFile('gambar')) {
            if (isset($umkm) && $umkm->gambar && Storage::disk('public')->exists($umkm->gambar)) {
                Storage::disk('public')->delete($umkm->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "umkm/{$dateFolder}"; // ganti sesuai entitas
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs($folder, $originalName, 'public');
            $umkm->gambar = "{$folder}/{$originalName}";
        }
        // ...existing code...
        $umkm->status = $request->status ?? false;
        $umkm->save();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan');
    }

    public function edit($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('admin.umkm.form', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $umkm = UMKM::findOrFail($id);
        $umkm->fill($request->except('gambar'));
        if ($request->hasFile('gambar')) {
            if ($umkm->gambar && Storage::disk('public')->exists($umkm->gambar)) {
                Storage::disk('public')->delete($umkm->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "umkm/{$dateFolder}";
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs("{$folder}", $originalName, 'public');
            $umkm->gambar = "{$folder}/{$originalName}";
        }
        $umkm->status = $request->status ?? false;
        $umkm->save();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate');
    }

    public function destroy($id)
    {
        $umkm = UMKM::findOrFail($id);
        if ($umkm->gambar && Storage::disk('public')->exists($umkm->gambar)) {
            Storage::disk('public')->delete($umkm->gambar);
        }
        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus');
    }

    public function toggle($id)
    {
        $umkm = UMKM::findOrFail($id);
        $umkm->status = !$umkm->status;
        $umkm->save();
        return redirect()->route('admin.umkm.detail', $umkm->id)
            ->with('success', 'Status UMKM berhasil diubah.');
    }
}