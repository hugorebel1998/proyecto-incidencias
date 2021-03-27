<?php

namespace App\Http\Controllers;

use App\Category;
use App\Incident;
use Illuminate\Http\Request;
use App\Http\Requests\IncidenceRequest;

class IncidenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incidencias = Incident::all();
        return view('incidencias.index', compact('incidencias'));
    }
    public function create()
    {
        $categorias = Category::all();
        return view('incidencias.create', compact('categorias'));
    }
    public function store(IncidenceRequest $request)
    {
        $incidencia = new Incident();
        $incidencia->id_category = $request->input('id_category') ?: null;
        $incidencia->title = $request->titulo;
        $incidencia->severity = $request->gravedad;
        $incidencia->description = $request->description;
        $incidencia->id_client = auth()->user()->id;

        if ($incidencia->save()) {
            $incidencia->id_category = $request->input('id_category') ?: null;
            $incidencia->title = $request->titulo;
            $incidencia->severity = $request->gravedad;
            $incidencia->description = $request->description;
            $incidencia->id_client = auth()->user()->id;

            if ($incidencia->save()) {
                toastr()->success('Se registro reporte :<b>' ." ". $incidencia->title . '</b>');
                return redirect()->to(route('incidencias.index'));
            } else {
                toastr()->error('Error al registrar reporte');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al registrar categoria');
            return redirect()->to(route('incidencias.create'));
        }
    }
}
