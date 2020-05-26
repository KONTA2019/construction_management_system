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
     //     $record_timings = RecordTiming::with('project')->get();
         $user = \Auth::id();
     //     $record_timings = RecordTiming::with('project.user')->get();
         $record_timings = RecordTiming::with('project.user')->where('user_id',auth()->id())->get();
     //     $record_timings = $record_timings_ready['project']['user_id'] == $user;


          // $record_timings = [];
          // foreach ((array)$record_timings_ready as $array1){
          //      foreach($array1 as $array2){
          //           foreach($array2 as $array3){
          //                if($array3['user_id'] == $user){
          //                     $record_timings = $array3;
          //                 }
          //           }
          //      }
          // }

     //     $record_timings = array_filter(
     //      $record_timings_ready,
     //      function($val) {
     //          return $val['user_id'] == '1';
     //      }
     //  );
      
   
     //     $record_timings = false;
     //      foreach ($record_timings_ready as $offset => $child) {
     //      if ($child['project']['user_id'] == $user) {
     //           break;
     //      }
     //           $record_timings = false;
     //      };
     

          // return var_dump($record_timings);
     //     return $record_timings->toArray();
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

          // return view('operation.create',compact('record_timing'));
          //  $url = action('RecordTiming@index');
          //  return $url;


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

}
