<?php

namespace App\Http\Controllers;

use App\Models\cfUser;
use App\Models\Disease;
use App\Models\ResultDiagnose;
use App\Models\Symptom;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $title = "Halaman Diagnosa";
        $symptoms = Symptom::select('name')->distinct()->get();
        $cfUsers = cfUser::all();

        return view('diagnosa', compact('title','symptoms','cfUsers'));
    }


    public function diagnose(Request $request)
    {
        $title = "Halaman Hasil Diagnosa";
        $symptoms = Symptom::all();
        $cases = ResultDiagnose::all();
        $diseases = Disease::select('name')->get();
        $max = 0;

        function sortArray( $data, $field ) {
            $field = (array) $field;
            usort( $data, function($a, $b) use($field) {
                $retval = 0;
                foreach( $field as $fieldname ) {
                    if( $retval == 0 ) $retval = strnatcmp( $b[$fieldname], $a[$fieldname] );
                }
                return $retval;
            } );
            return $data;
        }
        
        function nilaiCF($x, $y)
        {
            return $x * $y;
        }

        function newArr($arr){
            $i = 0;
            foreach($arr as $item){
                $newArr[$i] = str_replace(" ","_",$item->name);
                $i++;
            }
            return $newArr;
        }
        
        $disease = newArr($diseases);

        foreach($disease as $item){
            // dd($item);
            $temp = 0;
            foreach($symptoms as $symptom){
                $name = str_replace(" ","",$symptom->name);
                if($request->$name != 0){
                    $nameDisease = str_replace(" ","_",$symptom->disease->name);
                     if($nameDisease == $item){
                        $resultCFHE[$item][$temp] = [
                            'symptom'    => $symptom->name,
                            'disease'  => $symptom->disease->name,
                            'cf_role'   => $symptom->cf_role,
                            'cf_user'  => floatval($request->$name),
                            'cf_he'     => nilaiCF($symptom->cf_role, $request->$name),
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
            $dataCase = explode(",",$case->symptoms);
            foreach($resultCFHE as $key => $data){
                $resultCBR[$key] = 0;
                if($key == $case->disease){
                    for($i = 0; $i < count($data); $i++){
                        foreach($dataCase as $item){
                            if($data[$i]['symptom'] == $item){
                                $resultCBR[$key] += $data[$i]['cf_role'];
                            }else{
                                continue;
                            }
                        }
                    } 
                    $resultCBR[$key] = $resultCBR[$key] / $case->total_cf_role;
                }
            }
            // dd($key);
        }
        // dd($resultCBR);
        //perhitungan CF
        $temp = 0;
        foreach($resultCFHE as $key => $data){
            foreach($disease as $item){
                if($key == $item){ 
                    for($i = 0; $i < count($data); $i++){  
                        if($i == 0){
                            $resultCF[$item] = $data[$i]['cf_he'];
                            $totalCFRole[$item] = $data[$i]['cf_role'];
                        }else{
                            $resultCF[$item] = $resultCF[$item] + $data[$i]['cf_he'] * (1 - $resultCF[$item]);
                            $totalCFRole[$item] += $data[$i]['cf_role'];
                        }
                        $dataSymptom[$item][$i] = $data[$i]['symptom']; 
                        $dataCFRoles[$item][$i] = $data[$i]['cf_role'];
                        $dataCFUsers[$item][$i] = $data[$i]['cf_user'];
                    }
                    $dataResult[$temp] = [
                        'symptoms' => implode(",",$dataSymptom[$item]),
                        'disease' => $item,
                        'cf_roles' => implode(",",$dataCFRoles[$item]),
                        'cf_users' => implode(",",$dataCFUsers[$item]),
                        'total_cf_role' => $totalCFRole[$item],
                        'result_cbr' => $resultCBR[$item],
                        'result_cf' => $resultCF[$item],
                    ];
                    $temp++;
                }
            }
        }
        // dd($dataResult);
        $x =0;
        foreach($dataResult as $key => $data){
            $result[$x] = [
                'symptoms' => $data['symptoms'],
                'disease' => str_replace("_"," ",$data['disease']),
                'cf_roles' => $data['cf_roles'],
                'cf_users' => $data['cf_users'],
                'total_cf_role' => $data['total_cf_role'],
                'result_cbr' => $data['result_cbr'],
                'result_cf' => $data['result_cf'],
            ];
            if($data['result_cbr'] != 1 && $data['result_cbr'] >= 0.5 && $data['result_cf'] >= 0.6){
                ResultDiagnose::create($result[$x]);
            }
            $x++;  
        }

        $finalData = sortArray($result, 'result_cf');
        return view('result', compact('finalData','title'));
        // return redirect()->route('result', [$finalData]);
    }

}
