<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\RecordTiming;

class ProjectController extends Controller
{
     // getでprojects/にアクセスされた場合
     public function index()
     {
      return view('project.index');
     }
 
     // getでprojects/createにアクセスされた場合
     public function create()
     {
          return view('project.create');
     }
 
     // postでprojects/にアクセスされた場合
     public function store(Request $request)
     {
          $project = new Project;

          $project->user_id = auth()->id();
          $project->projectname = $request->input('projectname');
          $project->budget_division = $request->input('budget_division');
          $project->city = $request->input('city');
          $project->district = $request->input('district');
          $project->prefperson_in_charge = $request->input('prefperson_in_charge');
          $project->vendorperson_in_charge = $request->input('vendorperson_in_charge');
          $project->city = $request->input('city');

          // $project->id = Project::id();
          // $project->record_timing()->create($request->get('record_timing', []));
          $project->save();
          
          // $record_timing = new RecordTiming;
          // $record_timing->project_id = $project->id;
          // $record_timing->specific = $request->input('specific');
          // $record_timing->span = $request->input('span');
          // $record_timing->period = $request->input('period');
          // $record_timing->save();
          // dd($record_timing);



          // $project->span = $request->input('span');
          // $project->period = $request->input('period');

          return view('record_timing.create',compact('project'));

          // return redirect()->route('record_timing.create');
      
     }
 
     // getでprojects/idにアクセスされた場合
     public function show($id)
     {
         
     }
 
     // getでhprojects/id/editにアクセスされた場合
     public function edit($id)
     {
         
     }
 
     // putまたはpatchでprojects/idにアクセスされた場合
     public function update($id)
     {
         
     }
 
     // deleteでhello/idにアクセスされた場合
     public function destroy($id)
     {
         
     }
}
