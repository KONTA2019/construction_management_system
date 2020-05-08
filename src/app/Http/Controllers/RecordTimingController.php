<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordTiming;
use App\Models\Project;

class RecordTimingController extends Controller
{
    public function create()
     {
          return view('record_timing.create');
     }
 
     // postでprojects/にアクセスされた場合
     public function store(Request $request)
     {
          
          
          $record_timing = new RecordTiming;
          // $project->user_id = auth()->id();
          // Company::findOrFail($request->company_id);
          $record_timing->project_id = Project::all()->id();
          $record_timing->specific = $request->input('specific');
          $record_timing->span = $request->input('span');
          $record_timing->period = $request->input('period');
          
          // dd($record_timing);

          $record_timing->save();

          // $project->span = $request->input('span');
          // $project->period = $request->input('period');

          

          return redirect('home');
      
     }

}
