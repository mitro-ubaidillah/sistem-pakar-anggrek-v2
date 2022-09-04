<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\ResultDiagnose;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Halaman Admin';
        $penyakit = Disease::all();
        $kasus = ResultDiagnose::all();
        return view('admin.index', compact('title', 'penyakit', 'kasus'));
    }

    public function NonAdmin()
    {
        
    }
}
