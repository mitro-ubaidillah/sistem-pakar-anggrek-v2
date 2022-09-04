<?php

namespace App\Http\Controllers;

use App\Models\ResultDiagnose;
use App\Models\Symptom;
use App\Models\Disease;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index()
    {
        $cases = ResultDiagnose::oldest()->simplePaginate(5);
        $title = "Halaman Daftar Kasus";
        return view('admin.cases.index', compact('cases','title'));
    }

    public function create()
    {
        $symptoms = Symptom::select('name')->distinct()->get();
        $diseases = Disease::all();
        $title = "Halaman Tambah Kasus";
        // dd($symptoms);
        return view('admin.cases.create', compact('title','symptoms','diseases'));
    }

    public function show($id)
    {
        $symptoms = Symptom::all();
        $diseases = Disease::findOrFail($id);
        $i = 0;
        // dd($diseases);
        foreach ($symptoms as $value) {
            if($value->disease_id == $diseases->id){
                $dataGejala[$i] = [
                    'gejala' => $value->name,
                    'cf_role'=> $value->cf_role
                ];
                $i++;
            }
        }
        $title = "Halaman Tambah Kasus";
        // dd($symptoms);
        return view('admin.cases.show', compact('title','diseases','dataGejala'));
    }

    public function store(Request $request)
    {
        // dd($request->disease);
        $symptoms = Symptom::all();
        $i = 0;
        $totalCFRoles = 0;
        foreach($symptoms as $symptom){
            $name = "G".$i;
            // dd($name);
            if($symptom->name == $request->$name){
                $dataResult[$i] = $symptom->name;
                $dataCFRoles[$i] = $symptom->cf_role;
                $totalCFRoles += $symptom->cf_role;
                $i++;
            }
        }
        // dd($totalCFRoles)
        $create = ResultDiagnose::create([
            'disease' => $request->disease, 
            'symptoms' => implode(",",$dataResult), 
            'cf_roles' => implode(",",$dataCFRoles),
            'total_cf_role' => $totalCFRoles,
            'cf_users'  => 0,
            'result_cf' => 0,
            'result_cbr' => 1,
        ]);

        if($create){
            return redirect()->route('cases.index')->with('success', 'Kasus baru berhasil ditambahkan');
        }else{
            return redirect()->route('cases.index')->with('error', 'Kasus baru gagal ditambahkan');

        }
    }

    public function destroy($id){
        $case = ResultDiagnose::findOrFail($id);
        $case->delete();

        return redirect()->route('cases.index')->with('success', 'Kasus berhasil dihapus');
    }
}
