<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        // $penyakits = Penyakit::all();
        $title = "Halaman Gejala";
        $gejalas = Gejala::latest()->simplePaginate(5);
        return view('admin.gejala.index', compact('gejalas','title'));
    }

    public function create()
    {
        $title = "Halaman Tambah Gejala";
        $penyakits = Penyakit::all();
        return view('admin.gejala.create', compact('penyakits','title'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'gejala'          => 'required',
            'penyakit_id'    => 'required',
            'cf_role'        => 'required'
        ]);

        Gejala::create($validateData);
        return redirect('/admin/gejala')->with('success', 'Gejala berhasil didaftarkan!');
    }

    public function edit(Gejala $gejala)
    {
        $title = "Halaman Edit Penyakit";
        $penyakits = Penyakit::all();
        return view('admin.gejala.edit', compact('gejala', 'title', 'penyakits'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $validateData = $request->validate([
            'gejala'          => 'required',
            'penyakit_id'    => 'required',
            'cf_role'    => 'required|numeric'
        ]);

        Gejala::where('id', $gejala->id)->update($validateData);

        return redirect('/admin/gejala')->with('success', 'Gejala berhasil diubah!');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();
        return redirect('/admin/gejala')->with('success', 'Gejala berhasil dihapus!');
    }
}
