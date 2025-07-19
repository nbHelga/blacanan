<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\UMKM;
use App\Models\Budaya;
use App\Models\SOD;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::where('status', true)->get();
        $umkms = UMKM::where('status', true)->limit(3)->get();
        $budayas = Budaya::where('status', true)->limit(4)->get();
        $sods = SOD::where('status', true)->limit(3)->get();
        $blogs = Blog::with('images')->where('status', true)->limit(6)->get();
        $categories = Blog::select('kategori')->distinct()->get();
        $footer = \App\Models\Footer::with('kontak')->first();

        return view('home', compact('contents', 'umkms', 'budayas', 'sods', 'blogs', 'categories', 'footer'));
    }
    
    public function showProfil(){
        $profil = \App\Models\ProfilDesa::first();
        $statistik = \App\Models\Statistik::orderBy('urutan')->get();
        $mutasi = \App\Models\Mutasi::orderBy('urutan')->get();
        return view('profildesa', compact('profil', 'statistik', 'mutasi'));
    }

    public function byCategory($slug)
    {
        $blogs = Blog::where('kategori', $slug)->where('status', true)->get();
        $categories = Blog::select('kategori')->distinct()->get();

        return view('blog.index', compact('blogs', 'categories', 'slug'));
    }
    public function blogIndex()
    {
        $blogs = Blog::where('status', true)->get();
        $categories = Blog::select('kategori')->distinct()->get();
        $slug = null; // all

        return view('blog.index', compact('blogs', 'categories', 'slug'));
    }

    public function showKependudukan(){
        return view('kependudukan');
    }

    public function showSarana(){
        return view('sarana');
    }

    public function showWilayah(){
        return view('wilayah');
    }

    public function showInfografis(){
        return view('infografis');
    }

    public function showPPID(){
        return view('ppid');
    }
}
