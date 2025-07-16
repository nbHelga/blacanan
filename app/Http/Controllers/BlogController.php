<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $blog = Blog::findOrFail($id);
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
        return view('admin.blog.form', compact('blog'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $blog = new Blog($request->except('gambar'));
        if ($request->hasFile('gambar')) {
            if (isset($blog) && $blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "blog/{$dateFolder}";
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs("{$folder}", $originalName, 'public');
            $blog->gambar = "{$folder}/{$originalName}";
        }
        $blog->status = $request->status ?? false;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.form', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->fill($request->except('gambar'));
        if ($request->hasFile('gambar')) {
            if (isset($blog) && $blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
                Storage::disk('public')->delete($blog->gambar);
            }
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $dateFolder = date('Ymd');
            $folder = "blog/{$dateFolder}";
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $file->storeAs("{$folder}", $originalName, 'public');
            $blog->gambar = "{$folder}/{$originalName}";
        }
        $blog->status = $request->status ?? false;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diupdate');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
            Storage::disk('public')->delete($blog->gambar);
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