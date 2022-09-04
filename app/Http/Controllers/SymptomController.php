<?php

namespace App\Http\Controllers;

use App\Models\cfUser;
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
        $cfUsers = cfUser::all();
        return view('admin.symptom.create', compact('diseases','title','cfUsers'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'disease_id'    => 'required',
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
            'cf_role'        => 'required',
            'section'       => 'required'
        ]);

        Symptom::create($validateData);
        return redirect('/admin/symptom')->with('successAddSymptom', 'Gejala berhasil didaftarkan!');
    }

    public function edit(Symptom $symptom)
    {
        // dd($symptom);
        $title = "Halaman Edit Penyakit";
        $diseases = Disease::all();
        return view('admin.symptom.edit', compact('symptom', 'title', 'diseases'));
    }

    public function update(Request $request, Symptom $symptom)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
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
