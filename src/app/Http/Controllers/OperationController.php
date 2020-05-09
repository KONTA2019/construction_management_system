<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Operation;

class OperationController extends Controller
{
    public function create()
     {
          return view('operation.create');
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
          $operation->forth_amount = $request->input('memo');
                    
          $operation->save();

          return view('home');
     }
}
