<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

        
    }
    public function index(){
        
        $usuario = User::all();
        return view('usuarios.index');
        // return 'No puedes ingresar aqui';
    }
}
