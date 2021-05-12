<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Project;

class CategoryController extends Controller
{

    public function index()
    {
        $categorias = Category::all();
        // $proyecto = Project::findOrFail($categorias->id_project);
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        // $proyectos = Project::all();
        $proyectos = Project::select('id', 'name')->get();
        return view('categorias.create', compact('proyectos'));
    }
    public function store(CategoryRequest $request)
    {
        $categoria = new Category();
        $categoria->name = $request->nombre_categoria;
        $categoria->description = $request->descripción;
        // dd($categoria);
        if ($categoria->save()) {
            $categoria->name = $request->nombre_categoria;
            $categoria->description = $request->descripción;
            $categoria->id_project = $request->id_project;

            if ($categoria->save()) {
                toastr()->success('Se registro una nueva categoria:' . " " . $categoria->name);
                return redirect()->route('proyectos.index');
            } else {
                toastr()->error('Error al crear la categoria');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear la categoria');
            return redirect(route('categorias.create'));
        }
    }

    public function show($id)
    {
        $categoria = Category::findOrFail($id);
        // $proyecto = Project::findOrFail($categoria->id_project);
        return view('categorias.show', compact('categoria'));
    }

    public function edit($category)
    {
        $categoria = Category::findOrFail($category);

        return view('categorias.edit', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $categoria = Category::find($id);
        $request->validate([
            'nombre_categoria' => 'required',
            'descripción' => 'required',
            // 'id_project' => 'required'.$categoria->id_project
        ]);

        
        $categoria->name = $request->nombre_categoria;
        $categoria->description = $request->descripción;
        // $categoria->id_project = $request->id_project;
        // dd($categoria);
            if ($categoria->save()) {
                $categoria->name = $request->nombre_categoria;
                $categoria->description = $request->descripción;
                // $categoria->id_project = $request->id_project;
                // $proyecto->fecha_inicio = $fecha;

                if ($categoria->save()) {
                    toastr()->info('Se actualizó la categoria:' . " " . $categoria->name);
                    return redirect()->route('proyectos.index');
                } else {
                    toastr()->error('Error al actualizar la ctegoria');
                    return redirect()->back();
                }
            } else {
                toastr()->error('Error al actualizar la categoria');
                return redirect(route('categorias.create'));
            }
    }
}
