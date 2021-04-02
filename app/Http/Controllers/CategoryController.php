<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Project;

class CategoryController extends Controller
{

    public function index()
    {
        $categorias = Category::select('id', 'name')->get();
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        $proyectos = Project::all();
        return view('categorias.create', compact('proyectos'));
    }
    public function store(CategoryRequest $request)
    {
        $categoria = new Category();
        $categoria->name = $request->nombre_categoria;
        $categoria->description = $request->descripción;
        $categoria->id_project = $request->id_project;
        // dd($categoria);
        if ($categoria->save()) {
            $categoria->name = $request->nombre_categoria;
            $categoria->description = $request->descripción;
            $categoria->id_project = $request->id_project;

            if ($categoria->save()) {
                toastr()->success('Se registro una nueva categoria:' . " " . $categoria->name);
                return redirect()->route('categorias.index');
            } else {
                toastr()->error('Error al crear la categoria');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al crear la categoria');
            return redirect(route('categorias.create'));
        }
    }

    public function show($category)
    {
        $categoria = Category::findOrfail($category);
        return view('categorias.show', compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        $proyecto = Project::find($categoria->id_project);
        return view('categorias.edit', compact('categoria', 'proyecto'));
    }
    public function update(CategoryRequest $request, $id)
    {

        $categoria = Category::findOrFail($id);
        $categoria->name = $request->nombre_categoria;
        $categoria->description = $request->descripción;
        // $categoria->id_project = $request->id_project;
        dd($categoria);
    //     if ($categoria->save()) {
    //         $categoria->name = $request->nombre_categoria;
    //         $categoria->description = $request->descripción;
    //         // $categoria->id_project = $request->id_project;
    //         // $proyecto->fecha_inicio = $fecha;

    //         if ($categoria->save()) {
    //             toastr()->info('Se actualizó la categoria:' . " " . $categoria->name);
    //             return redirect()->route('categorias.index');
    //         } else {
    //             toastr()->error('Error al actualizar la ctegoria');
    //             return redirect()->back();
    //         }
    //     } else {
    //         toastr()->error('Error al actualizar la categoria');
    //         return redirect(route('categorias.create'));
    //     }
    }
}
