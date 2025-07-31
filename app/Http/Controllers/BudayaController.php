<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::where('status', true)->get();
        return view('budaya.index', compact('budayas'));
    }

    public function indexAdmin()
    {
        $budayas = Budaya::orderByDesc('created_at')->paginate(10);
        return view('admin.budaya.index', compact('budayas'));
    }

    public function create()
    {
        return view('admin.budaya.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $budaya = new Budaya($request->except('gambar'));
        $budaya->gambar = null; // Set default value

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "budaya/{$dateFolder}";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('budaya')) {
                Storage::disk('public')->makeDirectory('budaya');
            }
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $budaya->gambar = "{$folder}/{$originalName}";
        }

        $budaya->status = $request->status ?? false;
        $budaya->save();

        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil ditambahkan');
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        return view('admin.budaya.form', compact('budaya'));
    }

    public function update(Request $request, $id)
    {
        $budaya = Budaya::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $budaya->fill($request->except('gambar'));

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
                Storage::disk('public')->delete($budaya->gambar);
            }

            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "budaya/{$dateFolder}";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('budaya')) {
                Storage::disk('public')->makeDirectory('budaya');
            }
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $file->storeAs($folder, $originalName, 'public');
            $budaya->gambar = "{$folder}/{$originalName}";
        }

        $budaya->status = $request->status ?? false;
        $budaya->save();

        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil diupdate');
    }

    public function show($id)
    {
        $budaya = Budaya::findOrFail($id);
        return view('admin.budaya.detail', compact('budaya'));
    }

    // Method untuk public view (detail budaya)
    public function showDetail($id)
    {
        $budaya = Budaya::where('status', true)->findOrFail($id);
        return view('budaya.detail', compact('budaya'));
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
            Storage::disk('public')->delete($budaya->gambar);
        }
        $budaya->delete();
        return redirect()->route('admin.budaya.index')->with('success', 'Budaya berhasil dihapus');
    }

    public function toggle($id)
    {
        $budaya = Budaya::findOrFail($id);
        $budaya->status = !$budaya->status;
        $budaya->save();
        return back()->with('success', 'Status budaya berhasil diubah');
    }
}