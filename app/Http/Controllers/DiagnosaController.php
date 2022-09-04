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
        $title = "Diagnosa";
        $symptoms = Symptom::all();
        $a = 0;
        foreach($symptoms as $symptom){
            if($symptom->section == "daun"){
                $daun[$a++] = $symptom->name;
            }elseif($symptom->section == "akar"){
                $akar[$a++] = $symptom->name;
            }elseif($symptom->section == "batang"){
                $batang[$a++] = $symptom->name;
            }elseif($symptom->section == "bunga"){
                $bunga[$a++] = $symptom->name;
            }else{
                $other[$a++] = $symptom->name;
            }
        }
        
        $daun = array_unique($daun);
        $akar = array_unique($akar);
        $batang = array_unique($batang);
        $bunga = array_unique($bunga);
        $other = array_unique($other);

        $cfUsers = cfUser::all();
        return view('diagnosa', compact('title','cfUsers','daun','akar','batang','bunga','other'));
    }


    public function diagnose(Request $request)
    {
        // dd($request->all());
        $title = "Halaman Hasil Diagnosa";
        $symptoms = Symptom::all();
        $cases = ResultDiagnose::all(); 
        $diseases = Disease::select('name')->get();
        $dataDiseases = Disease::all();
        
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
        $x =0;
        $validasi = 0;
        foreach($disease as $item){
            $temp = 0;
            $count = 0;
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
                    $validasi +=1;
                    $dataGejala[$x++] = $symptom->name;
                    $resultCBR[$nameDisease] = 0;
                }else{
                    $count +=1;
                }
            }
        }
        // dd($validasi);
        if($count == count($symptoms)){
            return redirect('/diagnosa')->with('error', 'Belum memilih tingkat keyakinan pada gejala');
        }elseif($validasi == count($symptoms) || $validasi >= (count($symptoms) - 15)){
            return redirect('/diagnosa')->with('error', 'Pilih gejala yang benar-benar terjadi');
        }else{
            //Perhitungan CBR
            foreach($resultCFHE as $key => $cfhe){
                foreach($cases as $case){
                    if($key == str_replace(" ", "_", $case->disease)){
                        $dataCase = explode(",",$case->symptoms);
                        for ($i=0; $i < count($cfhe); $i++) { 
                            foreach($dataCase as $data){
                                if($cfhe[$i]['symptom'] == $data){
                                    $resultCBR[$key] += $cfhe[$i]['cf_role'];
                                }else{
                                    continue;
                                }
                            }
                        }
                        $resultCBR[$key] /= $case->total_cf_role;
                    }
                }
            }
            // validasi CBR
            $maxCBR = max($resultCBR);
            foreach($resultCBR as $key => $cbr){
                if($cbr > 0.7){
                    $dataCbr[$key] = $cbr;
                }elseif($maxCBR == 0.7){
                    if($cbr > ($maxCBR - 0.2)){
                        $dataCbr[$key] = $cbr;
                    }
                }elseif($maxCBR == 0.6){
                    if($cbr > ($maxCBR - 0.2)){
                        $dataCbr[$key] = $cbr;
                    }
                }elseif($maxCBR == 0.5){
                    if($cbr > ($maxCBR - 0.2)){
                        $dataCbr[$key] = $cbr;
                    }
                }elseif($maxCBR == 0.4){
                    if($cbr > ($maxCBR - 0.2)){
                        $dataCbr[$key] = $cbr;
                    }
                }elseif($maxCBR == 0.3){
                    if($cbr > ($maxCBR - 0.1)){
                        $dataCbr[$key] = $cbr;
                    }
                }elseif($cbr == $maxCBR){
                    $dataCbr[$key] = $cbr;
                }
            }
            // dd($dataCbr);
            //perhitungan CF
            $temp = 0;
            foreach($resultCFHE as $key => $data){
                // dd($data);
                foreach($dataCbr as $item => $cbr){
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
                            'result_cf' => $resultCF[$item],
                            'result_cbr' => $resultCBR[$item],
                        ];
                        $temp++;
                    }
                }
            }
            $x =0;
            foreach($dataResult as $key => $data){
                $cbr = round($data['result_cbr'],2);
                $cf = round($data['result_cf'],2);
                $result[$x] = [
                    'symptoms' => $data['symptoms'],
                    'disease' => str_replace("_"," ",$data['disease']),
                    'cf_roles' => $data['cf_roles'],
                    'cf_users' => $data['cf_users'],
                    'result_cbr' => $cbr,
                    'result_cf' => $cf,
                    'total_cf_role' => $data['total_cf_role'],
                ];
                // if($data['result_cbr'] != 1 && $data['result_cbr'] >= 0.8 && $data['result_cf'] >= 0.8){
                //     ResultDiagnose::create($result[$x]);
                // }
                $x++;  
            }
            function sortArray( $data, $field ) {
                $field = (array) $field;
                uasort( $data, function($a, $b) use($field) {
                    $retval = 0;
                    foreach( $field as $fieldname ) {
                        if( $retval == 0 ) $retval = strnatcmp( $b[$fieldname], $a[$fieldname] );
                    }
                    return $retval;
                } );
                return $data;
            }
            
            $dataFinalResult = sortArray($result, ['result_cf']);
            $i = 0;
            foreach($dataFinalResult as $data){
                $finalResult[$i] = $data;
                $i++;
            }
            // dd($finalResult);
            // $finalResult = sortArray($result, 'result_cbr');
            return view('result', compact('finalResult','title','dataDiseases'));
        }
    }
}