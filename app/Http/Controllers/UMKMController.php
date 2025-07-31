<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UMKMController extends Controller
{
    public function index()
    {
        $umkms = UMKM::where('status', true)->get();
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

        // Log::info('UMKMController Store - Request data:', $request->all());
        // Log::info('UMKMController Store - Has gambar file: ' . ($request->hasFile('gambar') ? 'true' : 'false'));

        $umkm = new UMKM($request->except('gambar'));
        $umkm->gambar = null; // Set default value

        if ($request->hasFile('gambar')) {
            // Log::info('UMKMController Store - Processing gambar upload');
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "umkms/{$dateFolder}";

            // Log::info('UMKMController Store - File info:', [
            //     'original_name' => $originalName,
            //     'size' => $file->getSize(),
            //     'mime_type' => $file->getMimeType(),
            //     'folder' => $folder
            // ]);

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('umkms')) {
                // Log::info('UMKMController Store - Creating umkms folder');
                Storage::disk('public')->makeDirectory('umkms');
            }
            if (!Storage::disk('public')->exists($folder)) {
                // Log::info('UMKMController Store - Creating date folder: ' . $folder);
                Storage::disk('public')->makeDirectory($folder);
            }

            try {
                $stored = $file->storeAs($folder, $originalName, 'public');
                // Log::info('UMKMController Store - File stored successfully: ' . $stored);
                $umkm->gambar = "{$folder}/{$originalName}";
                // Log::info('UMKMController Store - UMKM gambar set to: ' . $umkm->gambar);
            } catch (\Exception $e) {
                Log::error('UMKMController Store - Error storing file: ' . $e->getMessage());
            }
        } else {
            Log::info('UMKMController Store - No file upload');
        }

        $umkm->status = $request->status ?? false;

        Log::info('UMKMController Store - Before save, UMKM data:', [
            'nama' => $umkm->nama,
            'kategori' => $umkm->kategori,
            'deskripsi' => $umkm->deskripsi,
            'gambar' => $umkm->gambar,
            'status' => $umkm->status
        ]);

        try {
            $umkm->save();
            Log::info('UMKMController Store - UMKM saved successfully with ID: ' . $umkm->id);
        } catch (\Exception $e) {
            Log::error('UMKMController Store - Error saving UMKM: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan UMKM: ' . $e->getMessage());
        }

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
            $folder = "umkms/{$dateFolder}";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('umkms')) {
                Storage::disk('public')->makeDirectory('umkms');
            }
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
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