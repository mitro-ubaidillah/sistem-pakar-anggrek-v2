<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $title = "Halaman Penyakit";
        $diseases = Disease::latest()->simplePaginate(5);
        return view('admin.disease.index', compact('diseases','title'));
    }

    public function create()
    {
        return view('admin.disease.create',[
            "title"=>"Halaman Tambah Penyakit"
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name'          => 'required|unique:diseases,name',
            'description'    => 'required',
            'treatment'    => 'required'
        ]);

        Disease::create($validateData);
        return redirect('/admin/disease')->with('success', 'Penyakit berhasil didaftarkan!');
    }

    public function edit(Disease $disease)
    {
        $title = "Halaman Edit Penyakit";
        return view('admin.disease.edit', compact('disease', 'title'));
    }

    public function update(Request $request, Disease $disease)
    {
        $rules = [
            'description' => 'required',
            'treatment' => 'required'
        ];

        if($request->name != $disease->name){
            $rules['name'] = 'required|unique:diseases,name';
        }
        $validateData = $request->validate($rules);

        Disease::where('id', $disease->id)->update($validateData);
        return redirect('/admin/disease')->with('success', 'Penyakit berhasil diubah!');
    }

    public function destroy($id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();
        return redirect('/admin/disease')->with('success', 'Penyakit berhasil dihapus!');
    }
}
