<?php

namespace App\Http\Controllers;
use App\Models\cfUser;
use Illuminate\Http\Request;

class CfUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Halaman CF User";
        $cfUsers = cfUser::latest()->simplePaginate(5);
        return view('admin.cfUser.index', compact('title', 'cfUsers'));
    }

    public function create()
    {
        return view('admin.cfUser.create', ['title'=>'Halaman Tambah CF User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cf_user' => 'required|numeric|unique:cf_users,cf_user',
            'keterangan' => 'required|unique:cf_users,keterangan'
        ]);

        cfUser::create($validateData);

        return redirect('/admin/cfUser')->with('success', 'Data CF User Berhasil ditambahkan!');
    }

    public function edit(cfUser $cfUser)
    {
        $title = "Halaman Edit CF User";
        return view('admin.cfUser.edit', compact('title','cfUser'));
    }

    public function update(Request $request, cfUser $cfUser)
    {
        if($request->keterangan != $cfUser->keterangan){
            $rules['keterangan'] = 'required|unique:cf_users,keterangan';
        }
        if($request->cf_user != $cfUser->cf_user){
            $rules['cf_user'] = 'required|unique:cf_users,cf_user|numeric';
        }
        
        $validateData = $request->validate($rules);

        cfUser::where('id', $cfUser->id)->update($validateData);
        return redirect('/admin/cfUser')->with('success', 'Data CF User Berhasil diubah!');
    }

    public function destroy($id)
    {
        $cfUser = cfUser::findOrFail($id);
        $cfUser->delete();
        return redirect('/admin/cfUser')->with('success', 'Data CF User Berhasil dihapus!');
    }
}
