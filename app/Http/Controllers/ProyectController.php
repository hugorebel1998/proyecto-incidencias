<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Level;
use App\Http\Requests\ProjectRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ProyectController extends Controller
{

    public function index()
    {

        $proyectos = Project::all();
        $categorias = Category::all();
        $niveles = Level::all();
        return view('proyectos.index', compact('proyectos', 'categorias', 'niveles'));
    }

    public function create()
    {
        $categorias = Category::select('id', 'name')->get();
        $niveles = Level::select('id', 'name')->get();
        return view('proyectos.create',compact('categorias', 'niveles'));
    }


    public function store(ProjectRequest $request)
    {
        $fecha = Carbon::now();
        $proyecto = new Project();
        $proyecto->name = $request->nombre_proyecto;
        $proyecto->description = $request->descripción;
        $proyecto->fecha_inicio = $fecha;
        $proyecto->
        dd($proyecto);
        // if ($proyecto->save()) {
        //     $proyecto->name = $request->nombre_proyecto;
        //     $proyecto->description = $request->descripción;
        //     $proyecto->fecha_inicio = $fecha;

        //     if ($proyecto->save()) {
        //         toastr()->success('Se registro nuevo proyecto');
        //         return redirect()->route('proyectos.index');
        //     } else {
        //         toastr()->error('Error al crear proyecto');
        //         return redirect()->back();
        //     }
        // } else {
        //     toastr()->error('Error al crear proyecto');
        //     return redirect(route('proyectos.create'));
        // }
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
    public function update(Request $request, $id)
    {

        $proyecto = Project::findOrFail($id);

        $request->validate([
            'nombre_proyecto' => 'max:20|required',
            'descripción' => 'min:5|max:100|required',
            'fecha_inicio' => 'requiredunique:projects,fecha_inicio,' . $proyecto->id
        ]);

        $fecha = Carbon::now();
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
                toastr()->info('Se actualizó nuevo proyecto:' . " " . $proyecto->name);
                return redirect()->route('proyectos.index');
            } else {
                toastr()->error('Error al actualizar proyecto');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al actualizar proyecto');
            return redirect(route('proyectos.create'));
        }
    }
    function delete($id)
    {
        $proyecto = Project::find($id);

        toastr()->success('Proyecto eliminado con éxito');
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }

    // Reguistros eliminados
    function eliminados()
    {
        $proyectos = Project::withTrashed()->get();
        return view('proyectos.eliminados', compact('proyectos'));
    }

    // Restablecer registros
    function restoreProyect($id)
    {
        Project::onlyTrashed()->findOrFail($id)->restore();
        toastr()->success('Proyecto restablecido');
        return redirect()->route('proyectos.index');
    }
}
