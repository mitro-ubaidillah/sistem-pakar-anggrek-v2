<?php

namespace App\Http\Controllers;

use App\Models\cfUser;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\ResultDiagnose;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $title = "Halaman Diagnosa";
        $gejalas = Gejala::select('gejala')->distinct()->get();
        $cfUsers = cfUser::all();

        return view('diagnosa', compact('title','gejalas','cfUsers'));
    }

    public function diagnose(Request $request)
    {
        $gejalas = Gejala::all();
        $cases = ResultDiagnose::all();
        $penyakits = Penyakit::select('nama')->get();
        
        function nilaiCF($x, $y)
        {
            return $x * $y;
        }

        function newArr($arr){
            $i = 0;
            foreach($arr as $item){
                $newArr[$i] = str_replace(" ","_",$item->nama);
                $i++;
            }
            return $newArr;
        }
        
        $penyakit = newArr($penyakits);

        foreach($penyakit as $item){
            $temp = 0;
            foreach($gejalas as $gejala){
                $name = str_replace(" ","",$gejala->gejala);
                if($request->$name != 0){
                    $namaPenyakit = str_replace(" ","_",$gejala->penyakit->nama);
                    if($namaPenyakit == $item){
                        $resultCFHE[$item][$temp] = [
                            'gejala'    => $gejala->gejala,
                            'penyakit'  => $namaPenyakit,
                            'cf_role'   => $gejala->cf_role,
                            'cf_users'  => floatval($request->$name),
                            'cf_he'     => nilaiCF($gejala->cf_role, $request->$name),
                        ];
                        $temp++;
                    }else{
                        continue;
                    }
                }
            }
        }

        //Perhitungan CBR
        foreach($cases as $case){
            // dd(explode(",",$case->gejala));
            $dataCase = explode(",",$case->gejala);
            
        }

        dd($resultCFHE);
        //perhitungan CF
        foreach($resultCFHE as $key => $data){
            foreach($penyakit as $item){
                if($key == $item){
                    for($i = 0; $i < count($data); $i++){  
                        if($i == 0){
                            $resultCF[$item] = $data[$i]['cf_he'];
                        }else{
                            $resultCF[$item] = $resultCF[$item] + $data[$i]['cf_he'] * (1 - $resultCF[$item]);
                        }
                        $dataGejala[$item][$i] = $data[$i]['gejala'];
                    }
                    $dataResult = ResultDiagnose::create([
                        'gejala' => implode(",",$dataGejala[$item]),
                        'penyakit' => $item,
                        'hasil_cbr' => 0,
                        'hasil_cf' => $resultCF[$item],
                        'kemungkinan' => 0
                ]);
                }
            }
        }
        // dd($dataResult);
        

    }
}
