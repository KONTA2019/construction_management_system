<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordTiming;
use App\Models\Project;
use App\Models\Operation;

class RecordTimingController extends Controller
{

     public function index()
     {   
         $record_timings = RecordTiming::with('project.user')->where('user_id',auth()->id())->get();

         return view('record_timing.index',['record_timings' => $record_timings]);
     }

    public function create()
     {
          return view('record_timing.create');
     }
 
     // postでprojects/にアクセスされた場合
     public function store(Request $request)
     {
          
          $record_timing = new RecordTiming;

          $record_timing->user_id = auth()->id();
          $record_timing->project_id = $request->input('project_id');
          $record_timing->specific = $request->input('specific');
          $record_timing->span = $request->input('span');
          $record_timing->period = $request->input('period');
          $record_timing->save();

          return redirect()->to('/record_timing');
     }

     public function show($id)
     {
     // 工事名呼び出し用の変数
          $kouzimeiyou = RecordTiming::with('project')->where('id',$id)->first();
          // return $kouzimeiyou->toArray();
     
     // 施工の種類のより細かいもので、一致するもの同士が集まるように並べ替え
          $operations = Operation::where('record_timing_id',$id)->orderBy('first_operation_class','desc')
          ->orderBy('second_operation_class','desc')->orderBy('third_operation_class','desc')->orderBy('forth_operation_class','desc')
          ->orderBy('fifth_operation_class','desc')->orderBy('sixth_operation_class','desc')->get();
          
     // 施工量名を重複しないで表示するために配列を作成しています
         $sekou_syurui = [];
         foreach ($operations as $operation){
               $sekou_syurui[] = $operation->first_amount_name;
               $sekou_syurui[] = $operation->second_amount_name;
               $sekou_syurui[] = $operation->third_amount_name;
               $sekou_syurui[] = $operation->forth_amount_name;
         };
         $sekouryou_title_before = array_unique($sekou_syurui);
         $sekouryou_titles = array_diff($sekouryou_title_before, array(null));
         
     //     return $record_timing->toArray();
          return view('record_timing.show',['operations' => $operations,'sekouryou_titles' => $sekouryou_titles,'kouzimeiyou'=>$kouzimeiyou]);
     }

     public function syousai_matome($id)
     {

          // 工事名呼び出し用の変数
          $kouzimeiyou = RecordTiming::with('project')->where('id',$id)->first();
          // return $kouzimeiyou->toArray();

          // 施工の種類のより細かいもので、一致するもの同士が集まるように並べ替え
          $operations = Operation::where('record_timing_id',$id)->orderBy('first_operation_class','desc')
          ->orderBy('second_operation_class','desc')->orderBy('third_operation_class','desc')->orderBy('forth_operation_class','desc')
          ->orderBy('fifth_operation_class','desc')->orderBy('sixth_operation_class','desc')->get();

          return $operations->toArray();
          // 第三工種名が同じもので絞る
          // $third_operation_class = [];

          // $third_operation_class_id_yousos = Operation::query()->where('record_timing_id',$id)->distinct()->select('id','third_operation_class')->get();
          // $daisan_id = array_column($operations, 'third_operation_class', 'id');
          var_export(array_column($operations, 'third_operation_class', 'id'));
          // 第三工種名が重複しないで表示するために配列を作成しています
     //     $daisan_id = [];
     //     foreach ($third_operation_class_id_yousos as $third_operation_class_id_youso){
     //           $daisan_id[] = $third_operation_class_id_youso->id;
     //           $daisan_id[] = $third_operation_class_id_youso->tjird_operation_class;
               
     //           // $sekou_syurui[] = $third_operation_class_id_youso->third_amount_name;
     //           // $sekou_syurui[] = $third_operation_class_id_youso->forth_amount_name;
     //     };
     //     $sekouryou_title_before = array_unique($sekou_syurui);
     //     $sekouryou_titles = array_diff($sekouryou_title_before, array(null));



          // $third_operation_class_yousos = Operation::query()->where('record_timing_id',$id)->where('third_operation_class',)->select('id','third_operation_class','forth_operation_class','fifth_operation_class','sixth_operation_class')->groupBy('id','third_operation_class')->get();
          // return $third_operation_c
          
          // $third_operation_class_before = Operation::query()->where('record_timing_id',$id)->distinct()->select('third_operation_class');

          // $third_operation_class = array_column($third_operation_class_yousos, 'third_operation_class');
          // return $daisan_id->toArray();
          // $forth_operation_class = array_column($third_operation_class_yousos, 'forth_operation_class');
          // $fifth_operation_class = array_column($third_operation_class_yousos, 'fifth_operation_class');
          // $sixth_operation_class = array_column($third_operation_class_yousos, 'sixth_operation_class');

          // foreach($third_operation_class_yousos as $third_operation_class_youso){
          // $third_operation_class_before[] = array_keys($third_operation_class_youso,$third_operation_class_youso->third_operation_class);
          // };

          // foreach($third_operation_class_yousos as $third_operation_class_youso){
          //      $third_operation_class[] = $third_operation_class_youso->
          //      $third_operation_class[] = $third_operation_class_youso->
          //      $third_operation_class[] = $third_operation_class_youso->
          //      $third_operation_class[] = $third_operation_class_youso->
          // }
          
          
          // return $third_operation_class_before->toArray();

          // 施工量名を重複しないで表示するために配列を作成しています
         $sekou_syurui = [];
         foreach ($operations as $operation){
               $sekou_syurui[] = $operation->first_amount_name;
               $sekou_syurui[] = $operation->second_amount_name;
               $sekou_syurui[] = $operation->third_amount_name;
               $sekou_syurui[] = $operation->forth_amount_name;
         };
         $sekouryou_title_before = array_unique($sekou_syurui);
         $sekouryou_titles = array_diff($sekouryou_title_before, array(null));

         return view('record_timing.syousai_matome',['operations' => $operations,'sekouryou_titles' => $sekouryou_titles,'kouzimeiyou'=>$kouzimeiyou]);
     }

     public function syousai_keisan($id)
     {

     }


}
