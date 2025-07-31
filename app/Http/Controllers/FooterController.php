<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\FooterKontak;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::with('kontak')->first();
        return view('admin.footer.index', compact('footer'));
    }

    public function edit()
    {
        $footer = Footer::with('kontak')->first();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'maps' => 'nullable|string',
        ]);

        $footer = Footer::first();
        if (!$footer) {
            $footer = new Footer();
        }

        $data = $request->only(['deskripsi', 'alamat', 'maps']);

        $footer->fill($data);
        $footer->save();

        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diupdate');
    }

    public function addKontak(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string',
            'label' => 'nullable|string',
            'value' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $footer = Footer::first();
        if (!$footer) {
            $footer = Footer::create(['deskripsi' => '', 'alamat' => '']);
        }

        $kontakData = [
            'footer_id' => $footer->id,
            'tipe' => $request->tipe,
            'label' => $request->label,
            'value' => $request->value,
            'gambar' => null,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $folder = "footer_kontak";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $kontakData['gambar'] = "{$folder}/{$originalName}";
        }

        FooterKontak::create($kontakData);

        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil ditambahkan');
    }

    public function editKontak($id)
    {
        $kontak = FooterKontak::findOrFail($id);
        return response()->json($kontak);
    }

    public function updateKontak(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|string',
            'label' => 'nullable|string',
            'value' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $kontak = FooterKontak::findOrFail($id);
        $kontak->fill($request->except('gambar'));

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kontak->gambar && Storage::disk('public')->exists($kontak->gambar)) {
                Storage::disk('public')->delete($kontak->gambar);
            }

            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $folder = "footer_kontak";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $kontak->gambar = "{$folder}/{$originalName}";
        }

        $kontak->save();

        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil diupdate');
    }

    public function deleteKontak($id)
    {
        $kontak = FooterKontak::findOrFail($id);

        // Delete image if exists
        if ($kontak->gambar && Storage::disk('public')->exists($kontak->gambar)) {
            Storage::disk('public')->delete($kontak->gambar);
        }

        $kontak->delete();
        return redirect()->route('admin.footer.edit')->with('success', 'Kontak berhasil dihapus');
    }
}
