<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\FooterKontak;

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
        $footer = Footer::first();
        $footer->update($request->only(['deskripsi', 'alamat', 'maps']));
        return redirect()->route('admin.footer.index')->with('success', 'Footer berhasil diupdate');
    }

    public function addKontak(Request $request)
    {
        $footer = Footer::first();
        FooterKontak::create([
            'footer_id' => $footer->id,
            'tipe' => $request->tipe,
            'label' => $request->label,
            'value' => $request->value,
        ]);
        return back()->with('success', 'Kontak berhasil ditambahkan');
    }

    public function deleteKontak($id)
    {
        FooterKontak::findOrFail($id)->delete();
        return back()->with('success', 'Kontak berhasil dihapus');
    }
}
