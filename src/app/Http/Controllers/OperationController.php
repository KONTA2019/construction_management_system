<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Operation;

class OperationController extends Controller
{
    public function create()
     {
          // $operation = new Operation;
          // $operation = $reocord_timing;
          // dd($operation);

          $record_timing = request('record_timing');
          // $project_id = request('project_id');

          $operations = Operation::with('record_timing.project')->where('record_timing_id',$record_timing)->get();

          


          // if(isset(session('record_timing'))){
          //      $record_timing = session('record_timing');
          //  } else {
          //      $record_timing = $request->input('record_timing');
          //  };
          return view('operation.create',['operations' => $operations],['record_timing' => $record_timing]);

          // return view('operation.create',['operations' => $operations],['record_timing' => $record_timing],['project_id' => $project_id]);
     }
 
     // postでprojects/にアクセスされた場合
     public function store(Request $request)
     {
          
          $operation = new Operation;
          $operation->first_operation_class = $request->input('first_operation_class');
          $operation->second_operation_class = $request->input('second_operation_class');
          $operation->third_operation_class = $request->input('third_operation_class');
          $operation->forth_operation_class = $request->input('forth_operation_class');
          $operation->fifth_operation_class = $request->input('fifth_operation_class');
          $operation->sixth_operation_class = $request->input('sixth_operation_class');
          
          $operation->record_timing_id = $request->input('record_timing_id');

          $operation->kanni_keisan = $request->input('kanni_keisan');
          $operation->syousai_keisan = $request->input('syousai_keisan');

          $operation->first_amount_name = $request->input('first_amount_name');
          $operation->first_amount = $request->input('first_amount');
          $operation->second_amount_name = $request->input('second_amount_name');
          $operation->second_amount = $request->input('second_amount');
          $operation->third_amount_name = $request->input('third_amount_name');
          $operation->third_amount = $request->input('third_amount');
          $operation->forth_amount_name = $request->input('forth_amount_name');
          $operation->forth_amount = $request->input('forth_amount');
          
          $operation->reason_title = $request->input('reason_title');
          $operation->reason_text = $request->input('reason_text');
          $operation->memo = $request->input('memo');

          $operation->tanni = $request->input('tanni');
          // dd($operation);
          $operation->save();


          // 前画面のURLを取得
          $previousUrl = app('url')->previous();
          return redirect()->to($previousUrl)->withInput();

          // return redirect()->to($previousUrl.'?'. http_build_query(['record_timing'=>$operation['record_timing_id']]))->withInput();

          // return redirect()->back()->withInput()->with('record_timing', $record_timing);


          // return view('home');
          // return Redirect::back();
     }



}
