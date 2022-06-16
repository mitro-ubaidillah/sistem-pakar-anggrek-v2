<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenyakitController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }
    public function index()
    {
        $title = "Halaman Penyakit";
        $penyakits = Penyakit::latest()->simplePaginate(5);
        return view('admin.penyakit.index', compact('penyakits','title'));
    }

    public function create()
    {
        return view('admin.penyakit.create',[
            "title"=>"Halaman Tambah Penyakit"
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'nama'          => 'required|unique:penyakits,nama',
            'keterangan'    => 'required',
            'penanganan'    => 'required'
        ]);

        Penyakit::create($validateData);
        return redirect('/admin/penyakit')->with('success', 'Penyakit berhasil didaftarkan!');
    }

    public function edit(Penyakit $penyakit)
    {
        $title = "Halaman Edit Penyakit";
        return view('admin.penyakit.edit', compact('penyakit', 'title'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $rules = [
            'keterangan' => 'required',
            'penanganan' => 'required'
        ];

        if($request->nama != $penyakit->nama){
            $rules['nama'] = 'required|unique:penyakits,nama|alpha';
        }
        $validateData = $request->validate($rules);

        Penyakit::where('id', $penyakit->id)->update($validateData);
        return redirect('/admin/penyakit')->with('success', 'Penyakit berhasil diubah!');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();
        return redirect('/admin/penyakit')->with('success', 'Penyakit berhasil dihapus!');
    }
}
