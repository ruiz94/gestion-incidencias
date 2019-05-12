<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;
use App\Project;
class ProjectController extends Controller
{
  public function index()
  {
    $projects = Project::all();
    return view('admin/projects/index')->with(compact('projects'));;
  }
  public function store()
  {
    // code...
  }
  public function edit($id)
  {
    $project = Project::find($id);
    // dd($project);
    return view('admin/projects/edit')->with(compact('project'));
  }
  public function update()
  {
    // code...
  }
  public function delete($id)
  {
    // code...
  }
}
