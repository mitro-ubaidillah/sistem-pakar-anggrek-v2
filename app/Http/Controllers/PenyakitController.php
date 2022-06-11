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
        return view('admin.penyakit.penyakit', compact('penyakits','title'));
    }

    public function create()
    {
        // return view('admin.createPenyakit');
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'penyakit'          => 'required|unique:penyakits,penyakit',
        //     'detail_penyakit'   => 'required'
        // ]);

        // $penyakit = Penyakit::create([
        //     'penyakit'          => $request->penyakit,
        //     'detail_penyakit'   => $request->detail_penyakit,

        // ]);


        // if($penyakit){
        //     Alert::success('Berhasil', 'Kamu telah berhasil menambahkan data penyakit');
        //     return redirect()->route('penyakit.index');
        // }else{
        //     Alert::error('Gagal', 'Data gagal ditambahkan');
        //     return redirect()->route('penyakit.index');
        // }
    }

    public function edit(Penyakit $penyakit)
    {
        // return view('admin.editPenyakit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        // $this->validate($request, [
        //     'penyakit' => 'required',
        //     'detail_penyakit' => 'required'
        // ]);

        // $penyakit = Penyakit::findOrFail($penyakit->id);

        // $penyakit->update([
        //     'penyakit' => $request->penyakit,
        //     'detail_penyakit' => $request->detail_penyakit
        // ]);

        // if($penyakit){
        //     //redirect pesan sukses
        //     Alert::success('Berhasil', 'Kamu telah berhasil mengubah data penyakit');
        //     return redirect()->route('penyakit.index');
        // }else{
        //     Alert::error('Gagal', 'Data gagal diubah');
        //     return redirect()->route('penyakit.index');
        // }
    }

    public function destroy($id)
    {
        // $penyakit = Penyakit::findOrFail($id);
        // $penyakit->delete();

        // if($penyakit){
        //     //redirect pesan sukses
        //     Alert::success('Berhasil', 'Kamu telah berhasil menghapus data penyakit');
        //     return redirect()->route('penyakit.index');
        // }else{
        //     Alert::error('Gagal', 'Data gagal dihapus');
        //     return redirect()->route('penyakit.index');
        // }
    }
}
