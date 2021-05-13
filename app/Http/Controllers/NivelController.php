<?php

namespace App\Http\Controllers;

use App\Level;
use App\Project;
use App\Http\Requests\NivelRequest;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index(){
        $niveles = Level::all();
        return view('niveles.index',compact('niveles'));
    }
    public function create(){
        // $proyectos = Project::select('id', 'name')->get();
        return view('niveles.create');
    }

    public function store(NivelRequest $request){
        
        $nivel = new Level();
        $nivel->name = $request->nombre_nivel;
        // $nivel->id_project = $request->id_project;
        
        // dd($nivel);
        if ($nivel->save()) {
            $nivel->name = $request->nombre_nivel;

            if ($nivel->save()) {
                toastr()->success('Se registro nuevo nivel');
                return redirect()->route('proyectos.index');
            } else {
                toastr()->error('Error al crear nivel');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear nivel');
            return redirect(route('niveles.create'));
        }        
    }
    public function byProject($id)
    {
        return Level::where('id_project', $id)->get();
    }
}
