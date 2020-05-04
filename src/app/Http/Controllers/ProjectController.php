<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     public function store()
     {
         
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
