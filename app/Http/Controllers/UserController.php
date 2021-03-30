<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }


    public function index()
    {
        $usuarios = User::where('id', '!=', 1)->get();
        return view('usuarios.index', compact('usuarios'));
    }
    public function create()
    {
        $usuarios = User::where('id', "!=", 2)->get();
        return view('usuarios.create', compact('usuarios'));
    }
    public function store(Request $request)
    {
        $usuario = new User();
        $fecha = Carbon::now();
        
        $request->validate([
            'nombre' => 'required|min:3',
            'correo_electronico' => 'required|email|unique:users,email',
            'contraseña' => 'required|min:8|max:15'
        ]);
        

        $usuario->name = $request->nombre;
        $usuario->email = $request->correo_electronico;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->created_at = $fecha;

        // dd($usuario);
        if ($usuario->save()) {
            $usuario->name = $request->nombre;
            $usuario->email = $request->correo_electronico;
            $usuario->created_at = $fecha;

            if ($usuario->save()) {
                toastr()->success('Se registro nuevo usuario:' . " " . $usuario->name);
                return redirect()->route('usuarios.index');
            } else {
                toastr()->error('Error al crear usuario');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear usuario');
            return redirect(route('usuarios.create'));
        }
    }
    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.show', compact('usuario'));
    }
    public function edit($id)
    {

        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }
    public function update(Request $request, $id)
    {

        $usuario = User::findOrFail($id);
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;


        if ($usuario->save()) {
            $usuario->name = $request->name;
            $usuario->email = $request->email;

            if ($usuario->save()) {
                toastr()->success('Se actualizo usuario:' . " " . $usuario->name);
                return redirect()->route('usuarios.index');
            } else {
                toastr()->error('Error al crear usuario');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear usuario');
            return redirect(route('usuarios.edit'));
        }
    }

    public function delete($id)
    {

        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuario.index');
    }
}
