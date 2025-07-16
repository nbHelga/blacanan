<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::all();
        return view('budaya.index', compact('budayas'));
    }

    public function showHome()
    {
        $budayas = Budaya::where('status', true)->limit(4)->get();
        return view('home', compact('budayas'));
    }
    public function show($id)
    {
        $budaya = Budaya::findOrFail($id);
        return view('budaya.detail', compact('budaya'));
    }
}
