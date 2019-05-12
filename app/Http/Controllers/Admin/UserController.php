<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::where('rol',1)->get();
    return view('admin.users.index')->with(['nombre_label'=>'Usuarios', 'users'=>$users]);
  }

  public function store(Request $req)
  {
    $this->validate($req, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
        ],
        [
          'name.required' => 'El nombre del usuario es obligatorio',
          'name.max' => 'El nombre debe contener menos de 255 caracteres',
          'email.required' => 'El e-mail del usuario es obligatorio',
          'email.email' => 'El e-mail es incorrecto',
          'email.max' => 'El e-mail debe contener menos de 255 caracteres',
          'email.unique' => 'El e-mail ya esta en uso',
          'password.required' => 'La contraseña del usuario es obligatoria',
          'password.min' => 'La contraseña debe contener al menos 6 caracteres'
          ]
      );

      $user = new User();
      $user->name = $req->name;
      $user->email = $req->email;
      $user->password = bcrypt($req->password);
      $user->rol = 1;
      $estatus = $user->save();
// $estatus=false;
      if ($estatus) {
        $mensaje = "Se ha agregado el usuario con éxito";
        $tipo = true;
      }else {
        $mensaje = "Ha ocurrido un error al intentar crear el usuario";
        $tipo = false;
      }

    return back()->with(["mensaje"=>$mensaje, "tipo"=>$tipo]);
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('admin.users.edit')->with(compact('user'));
  }

  public function update(Request $req, $id)
  {
    $user = User::find($id);

    $this->validate($req,
    [
      'email' => 'required|max:255|email',
      'name' => 'required|max:255',
      'password' => 'min:6'
    ],
    [
      'email.required' => 'El email es obligatorio',
      'email.max' => 'El email debe contener como minimo 255 caracteres',
      'email.email' => 'El email no es valido',
      'name.required' => 'El nombre es obligatorio',
      'name.required' => 'El nombre debe contener como minimo 255 caracteres',
      'password.min' => 'La contraseña debe contener como minimo 6 caracteres'
    ]
    );

    $user->name = $req->name;
    $user->password = bcrypt($req->password);
    $user->email = $req->email;
    $estatus = $user->save();

    if ($estatus) {
      $mensaje = "El usuario se modifico con éxito";
      $tipo = true;
    }else {
      $mensaje = "Ocurrió un error, El usuario no se modifico";
      $tipo = false;
    }

    return back()->with(["mensaje"=>$mensaje, "tipo"=>$tipo]);
  }

  public function delete($id)
  {
    // $user = User::onlyTrashed()->where('id',1)->first();
    // $user->restore();
    //
    $user = User::find($id);
    // dd($user);
    $estatus = $user->delete();
    if ($estatus) {
      $mensaje = "El usuario se elimino con éxito";
      $tipo = true;
    }else {
      $mensaje = "Ocurrió un error, El usuario no se elimino";
      $tipo = false;
    }

    return back()->with(['mensaje'=>$mensaje, "tipo"=>$tipo]);
  }
}
