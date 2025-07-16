<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UMKM;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Terakhir aktif (user terakhir login)
        $lastActive = User::orderBy('last_login_at', 'desc')->first();

        // Jumlah pengunjung (user yang pernah mengakses home, misal log di tabel users)
        $visitorCount = User::count();

        // UMKM terdaftar
        $umkmCount = UMKM::count();

        // Jumlah konten blog
        $blogCount = Blog::count();

        // Berita terbaru (ambil 3 blog terbaru)
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return view('admin.dashboard', [
            'lastActive' => $lastActive,
            'visitorCount' => $visitorCount,
            'umkmCount' => $umkmCount,
            'blogCount' => $blogCount,
            'latestBlogs' => $latestBlogs,
        ]);
    }
}
