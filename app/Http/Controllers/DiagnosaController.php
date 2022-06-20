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
        // dd($resultCFHE);

        //Perhitungan CBR
        foreach($cases as $case){
            // dd($case->penyakit);
            $dataCase = explode(",",$case->gejala);
            foreach($resultCFHE as $key => $data){
                if($key == $case->penyakit){
                    $resultCBR[$key] = 0;
                    for($i = 0; $i < count($data); $i++){
                        foreach($dataCase as $item){
                            if($data[$i]['gejala'] == $item){
                                $resultCBR[$key] += $data[$i]['cf_role'];
                            }else{
                                continue;
                            }
                        }
                    } 
                    $resultCBR[$key] = $resultCBR[$key] / $case->total_cf_role;
                }
            }
            // dd($dataCase);
        }
        // dd($resultCBR);

        //perhitungan CF
        foreach($resultCFHE as $key => $data){
            foreach($penyakit as $item){
                if($key == $item){
                    for($i = 0; $i < count($data); $i++){  
                        if($i == 0){
                            $resultCF[$item] = $data[$i]['cf_he'];
                            $totalCFRole[$item] = $data[$i]['cf_role'];
                        }else{
                            $resultCF[$item] = $resultCF[$item] + $data[$i]['cf_he'] * (1 - $resultCF[$item]);
                            $totalCFRole[$item] += $data[$i]['cf_role'];
                        }
                        $dataGejala[$item][$i] = $data[$i]['gejala'];
                        
                    }
                //     $dataResult = ResultDiagnose::create([
                //         'gejala' => implode(",",$dataGejala[$item]),
                //         'penyakit' => $item,
                //         'total_cf_role' => $totalCFRole[$item],
                //         'hasil_cbr' => 0,
                //         'hasil_cf' => $resultCF[$item],
                //         'kemungkinan' => 0
                // ]);
                // dd($resultCF[$item]);
                $propability = max($resultCBR[$item],$resultCF[$item]);
                dd($propability);
                $dataResult = [
                    'gejala' => implode(",",$dataGejala[$item]),
                    'penyakit' => $item,
                    'total_cf_role' => $totalCFRole[$item],
                    'hasil_cbr' => $resultCBR[$item],
                    'hasil_cf' => $resultCF[$item],
                    'kemungkinan' => 0
                ];
                }
            }
        }
        // dd($dataResult);
        

    }
}
