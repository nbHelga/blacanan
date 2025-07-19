<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        $categories = Blog::select('kategori')->distinct()->get();
        $slug = null; // all

        return view('blog.index', compact('blogs', 'categories', 'slug'));
    }
    
    public function show($id)
    {
        $blog = Blog::with('images')->findOrFail($id);
        return view('blog.detail', compact('blog'));
    }

    public function adminIndex()
    {
        // $perPage = $request->get('perPage', 10);
        $blogs = Blog::paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function adminShow($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.detail', compact('blog'));
    }

    public function create()
    {
        $blog = null;
        $images = [];
        return view('admin.blog.form', compact('blog','images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|max:2048',
        ]);

        $blog = new Blog($request->except('gambar'));
        $blog->status = $request->status ?? false;
        $blog->save();

        // Handle multiple images from GambarUpload component
        if ($request->hasFile('gambar')) {
            $dateFolder = date('Ymd');
            $folder = "blogs/{$dateFolder}";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('blogs')) {
                Storage::disk('public')->makeDirectory('blogs');
            }
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            // $files = is_array($request->file('gambar')) ? $request->file('gambar') : [$request->file('gambar')];

            // foreach ($files as $index => $file) {
            foreach ($request->file('gambar') as $index => $file) {
                if ($file && $file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $file->storeAs($folder, $originalName, 'public');

                    BlogImage::create([
                        'blog_id' => $blog->id,
                        'gambar' => "{$folder}/{$originalName}",
                        'urutan' => $index + 1
                    ]);
                }
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan');
    }

    public function edit($id)
    {
        $blog = Blog::with('images')->findOrFail($id);
        $images = $blog->images->pluck('gambar')->map(function($img) {
        return 'storage/' . $img;
        })->toArray();
        return view('admin.blog.form', compact('blog', 'images'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->fill($request->except('gambar'));

        // Handle new images if uploaded
        if ($request->hasFile('gambar')) {
            // Delete old images
            foreach ($blog->images as $oldImage) {
                if (Storage::disk('public')->exists($oldImage->gambar)) {
                    Storage::disk('public')->delete($oldImage->gambar);
                }
                $oldImage->delete();
            }

            $dateFolder = date('Ymd');
            $folder = "blogs/{$dateFolder}";

            // Create folder if it doesn't exist
            if (!Storage::disk('public')->exists('blogs')) {
                Storage::disk('public')->makeDirectory('blogs');
            }
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            // $files = is_array($request->file('gambar')) ? $request->file('gambar') : [$request->file('gambar')];

            // foreach ($files as $index => $file) {
            foreach ($request->file('gambar') as $index => $file) {
                if ($file && $file->isValid()) {
                    $originalName = $file->getClientOriginalName();
                    $file->storeAs($folder, $originalName, 'public');

                    BlogImage::create([
                        'blog_id' => $blog->id,
                        'gambar' => "{$folder}/{$originalName}",
                        'urutan' => $index + 1
                    ]);
                }
            }
        }

        $blog->status = $request->status ?? false;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diupdate');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete all images
        foreach ($blog->images as $image) {
            if (Storage::disk('public')->exists($image->gambar)) {
                Storage::disk('public')->delete($image->gambar);
            }
            $image->delete();
        }

        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus');
    }

    public function toggle($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();
        return redirect()->route('admin.blog.detail', $blog->id)
            ->with('success', 'Status Blog berhasil diubah.');
    }
}