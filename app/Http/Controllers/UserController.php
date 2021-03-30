<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware(['permission:create report'], ['only' => 'create', 'store']);
        $this->middleware(['permission:read reports'], ['only' => 'index']);
        $this->middleware(['permission:update report'], ['only' => 'edit', 'update']);
        $this->middleware(['permission:delete report'], ['only' => 'delete']);

        
    }
    public function index(){
        
        $usuarios = User::where('role', 1)->where('id', '!=', 1)->get();
        return view('usuarios.index', compact('usuarios'));
        
    }
}
