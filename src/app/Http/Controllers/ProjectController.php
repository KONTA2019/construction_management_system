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

          $project->save();

          return view('record_timing.create',compact('project'));

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
