<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; 

class ContentController extends Controller
{
    // public function showSlide()
    // {
    //     $contents = Content::latest()->take(5)->get(); // contoh ambil 5 konten terbaru
    //     return view('home', compact('contents'));
    // }
    public function index()
    {
        // $perPage = $request->get('perPage', 10);
        $contents = Content::paginate(10);

        $headers = ['Judul', 'Status', 'Tanggal'];
        $rows = [];

        foreach ($contents as $content) {
            $rows[] = [
                'id' => $content->id,
                $content->judul,
                $content->status,
                $content->created_at->format('d-m-Y'),
            ];
        }

        return view('admin.content.index', compact('contents', 'headers', 'rows'));
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.detail', compact('content'));
    }

    public function create()
    {
        $content = null; // definisikan variabel kosong
        $images = [];
        return view('admin.content.form', compact('content', 'images'));
        // return view('admin.content.form');
    }

    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048',
        'video' => 'nullable|mimetypes:video/mp4,video/webm|max:51200', // max 50MB ~ 5 menit
        'tipe' => 'required|in:gambar,video',
    ]);

    $content = new Content($request->except(['gambar', 'video']));

    $dateFolder = date('Ymd');
    $folder = "content/{$dateFolder}";

    if ($request->tipe === 'gambar' && $request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $originalName = $file->getClientOriginalName();

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
        $file->storeAs($folder, $originalName, 'public');
        $content->gambar = "{$folder}/{$originalName}";
        $content->video = null;
    } elseif ($request->tipe === 'video' && $request->hasFile('video')) {
        $file = $request->file('video');
        $originalName = $file->getClientOriginalName();

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
        $file->storeAs($folder, $originalName, 'public');
        $content->video = "{$folder}/{$originalName}";
        $content->gambar = null;
    }

    $content->status = $request->status ?? false;
    $content->save();

    return redirect()->route('admin.content.index')->with('success', 'Content berhasil ditambahkan');
    }


    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.form', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/webm|max:51200',
            'tipe' => 'required|in:gambar,video',
        ]);

        $content = Content::findOrFail($id);
        $content->fill($request->except(['gambar', 'video']));

        // Handle file uploads based on type
        if ($request->tipe === 'gambar' && $request->hasFile('gambar')) {
            // Delete old files
            if ($content->gambar && Storage::disk('public')->exists($content->gambar)) {
                Storage::disk('public')->delete($content->gambar);
            }
            if ($content->video && Storage::disk('public')->exists($content->video)) {
                Storage::disk('public')->delete($content->video);
            }

            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "content/{$dateFolder}";

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs($folder, $originalName, 'public');
            $content->gambar = "{$folder}/{$originalName}";
            $content->video = null;

        } elseif ($request->tipe === 'video' && $request->hasFile('video')) {
            // Delete old files
            if ($content->gambar && Storage::disk('public')->exists($content->gambar)) {
                Storage::disk('public')->delete($content->gambar);
            }
            if ($content->video && Storage::disk('public')->exists($content->video)) {
                Storage::disk('public')->delete($content->video);
            }

            $file = $request->file('video');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "content/{$dateFolder}";

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs($folder, $originalName, 'public');
            $content->video = "{$folder}/{$originalName}";
            $content->gambar = null;
        }

        $content->status = $request->status ?? false;
        $content->save();

        return redirect()->route('admin.content.index')->with('success', 'Content berhasil diupdate');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);

        // Delete image file if exists
        if ($content->gambar && Storage::disk('public')->exists($content->gambar)) {
            Storage::disk('public')->delete($content->gambar);
        }

        // Delete video file if exists
        if ($content->video && Storage::disk('public')->exists($content->video)) {
            Storage::disk('public')->delete($content->video);
        }

        $content->delete();
        return redirect()->route('admin.content.index')->with('success', 'Content berhasil dihapus');
    }

    public function toggle($id)
    {
        $content = Content::findOrFail($id);
        $content->status = !$content->status;
        $content->save();
        return redirect()->route('admin.content.detail', $content->id)
            ->with('success', 'Status konten berhasil diubah.');
    }
}
