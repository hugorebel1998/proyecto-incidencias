<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\ProjectRequest;
use Carbon\Carbon;

class ProyectController extends Controller
{

    public function index()
    {
        $proyectos = Project::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }


    public function store(ProjectRequest $request)
    {
        $fecha = Carbon::now();
        $proyecto = new Project();
        $proyecto->name = $request->nombre_proyecto;
        $proyecto->description = $request->descripción;
        $proyecto->fecha_inicio = $fecha;
        // dd($proyecto);
        if ($proyecto->save()) {
            $proyecto->name = $request->nombre_proyecto;
            $proyecto->description = $request->descripción;
            $proyecto->fecha_inicio = $fecha;

            if ($proyecto->save()) {
                toastr()->success('Se registro nuevo proyecto:' . " " . $proyecto->name);
                return redirect()->route('proyectos.index');
            } else {
                toastr()->error('Error al crear proyecto');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear proyecto');
            return redirect(route('usuarios.create'));
        }        
    }

    public function show($proyect)
    {
        $proyecto = Project::findOrfail($proyect);
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id)
    {
        $proyecto = Project::find($id);
        return view('proyectos.edit', compact('proyecto'));
    }
    public function update(ProjectRequest $request, $id)
    {
        $fecha = Carbon::now();
        $proyecto = Project::findOrFail($id);
        $proyecto->name = $request->nombre_proyecto;
        $proyecto->description = $request->descripción;
        $proyecto->fecha_inicio = $fecha;
        // dd($proyecto);
        if ($proyecto->save()) {
            $proyecto->name = $request->nombre_proyecto;
            $proyecto->description = $request->descripción;
            $proyecto->fecha_inicio = $fecha;
            // $proyecto->fecha_inicio = $fecha;

            if ($proyecto->save()) {
                toastr()->success('Se actualizó nuevo proyecto:' . " " . $proyecto->name);
                return redirect()->route('proyectos.index');
            } else {
                toastr()->error('Error al actualizar proyecto');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al actualizar proyecto');
            return redirect(route('usuarios.create'));
        }
     }
}
