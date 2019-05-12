<?php

namespace App\Http\Controllers;
use App\Category;
use App\Incident;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getReport()
    {
      $categories = Category::where('project_id', 1)->get();
      // dd($categories);
      return view('report')->with(compact('categories'));
    }
    public function postReport(Request $req)
    {
      $this->validate($req, [
        // 'category' => 'required|exists:categories,id',
        'category' => 'sometimes|exists:categories,id',
        'severity'=> 'required|in:M,N,A',
        'title' => 'required|min:5',
        'description' => 'required|min:15'
      ], [
        'severity.required'=> 'Es necesario seleccionar la severidad de la incidencia',
        'title.required' => 'Es necesario ingresar un título para la incidencia.',
        'title.min' => 'El título debe presentar al menos 5 caracteres.',
        'description.required' => 'Es necesario ingresar una descripción para la incidencia.',
        'description.min' => 'La descripción debe presentar al menos 15 caracteres.'
      ]);

      $incident = new Incident;
      $incident->category_id = $req->category?:null;
      $incident->severity = $req->severity;
      $incident->title = $req->title;
      $incident->description = $req->description;
      $incident->client_id = auth()->user()->id;
      $incident->save();
      return back();
    }
}
