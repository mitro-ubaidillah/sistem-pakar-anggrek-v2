<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index()
    {
        // $penyakits = Penyakit::all();
        $title = "Halaman Gejala";
        $symptoms = Symptom::latest()->simplePaginate(5);
        return view('admin.symptom.index', compact('symptoms','title'));
    }

    public function create()
    {
        $title = "Halaman Tambah Gejala";
        $diseases = Disease::all();
        return view('admin.symptom.create', compact('diseases','title'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'disease_id'    => 'required',
            'name'          => 'required',
            'cf_role'        => 'required'
        ]);

        Symptom::create($validateData);
        return redirect('/admin/symptom')->with('success', 'Gejala berhasil didaftarkan!');
    }

    public function edit(Symptom $symptom)
    {
        $title = "Halaman Edit Penyakit";
        $diseases = Disease::all();
        return view('admin.symptom.edit', compact('symptom', 'title', 'diseases'));
    }

    public function update(Request $request, Symptom $symptom)
    {
        $validateData = $request->validate([
            'symptom'          => 'required',
            'disease_id'    => 'required',
            'cf_role'    => 'required|numeric'
        ]);

        Symptom::where('id', $symptom->id)->update($validateData);

        return redirect('/admin/symptom')->with('success', 'Gejala berhasil diubah!');
    }

    public function destroy($id)
    {
        $symptom = Symptom::findOrFail($id);
        $symptom->delete();
        return redirect('/admin/symptom')->with('success', 'Gejala berhasil dihapus!');
    }
}
