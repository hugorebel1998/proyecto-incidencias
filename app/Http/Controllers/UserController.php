<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ContrasenaRequest;
use App\Level;
use App\Project;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware(['permission:create report'], ['only' => 'create', 'store']);
        $this->middleware(['permission:read reports'], ['only' => 'index']);
        $this->middleware(['permission:update report'], ['only' => 'edit', 'update']);
        $this->middleware(['permission:delete report'], ['only' => 'delete']);
    }

    public function index()
    {
        $usuarios = User::where('role', 1)->where('id', '!=', 1)->get();
        return view('usuarios.index', compact('usuarios'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }
    public function store(UserRequest $request)
    {
        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->correo_electronico;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->telefono = $request->telefóno;
        $usuario->role = 1;

        // dd($usuario);
        if ($usuario->save()) {
            $usuario->assignRole('soporte');
            $usuario->name = $request->nombre;
            $usuario->email = $request->correo_electronico;
            $usuario->password = bcrypt($request->contraseña);
            $usuario->telefono = $request->telefóno;

            if ($usuario->save()) {
                toastr()->success('Se registro nuevo usuario');
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
        $proyectos = Project::select('id', 'name')->get();
        $niveles = Level::select('id', 'name')->get();
        return view('usuarios.edit', compact('usuario', 'proyectos', 'niveles'));
    }
    public function update(Request $request, $id)
    {

        $usuario = User::findOrFail($id);
        $request->validate([
            'nombre' => 'required|min:3',
            'correo_electronico' => 'required|email|unique:users,email,' . $usuario->id,
            'telefóno' => 'max:10|required'
        ]);

        $usuario->name = $request->nombre;
        $usuario->email = $request->correo_electronico;
        $usuario->telefono = $request->telefóno;
        //    dd($usuario);

        if ($usuario->save()) {
            $usuario->name = $request->nombre;
            $usuario->email = $request->correo_electronico;
            $usuario->telefono = $request->telefóno;

            if ($usuario->save()) {
                toastr()->info('Se actualizo usuario: ' . $usuario->name);
                return redirect()->route('usuarios.edit', $usuario->id);
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
        toastr()->success('Se elimino usuario ');
        return redirect()->route('usuario.index');
    }

    public function contrasena($id)
    {

        $usuario = $id;
        return view('usuarios.contrasena', compact('usuario'));
    }

    public function cambiar(ContrasenaRequest $request)
    {
        $usuario = User::find($request->id);
        $usuario->password;

        if (Hash::check($request->contraseña, $usuario->password)) {
            $usuario->password = bcrypt($request->nueva_contraseña);
            if ($usuario->save()) {
                toastr()->success('Cambio de contraseña con éxito');
                return redirect()->to(route('usuarios.index'));
            }
        } else {
            toastr()->error('La contraseña actual no coincide');
            return back();
        }
    }
}
