<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfografisController extends Controller
{
    public function index()
    {
        // Ambil data dari database atau array statis
        return view('infografis', [
            'dataPenduduk' => [...],
            'dataDusun' => [...],
            'dataPendidikan' => [...],
            'dataPerkawinan' => [...],
            'dataAgama' => [...],
            'dataSarana' => [...],
        ]);
    }
}
