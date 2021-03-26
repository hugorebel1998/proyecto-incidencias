<?php

namespace App\Http\Controllers;

use App\Incident;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incidencias = Incident::all();
        return view('incidencias.index',compact('incidencias'));
    }
    public function create()
    {
        return view('incidencias.create');
    }
}
