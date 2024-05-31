<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Productos;


class ProductoController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('operador', ['except' => 'index']);
    }
    public function index(){

        $productos = Productos::all();

        return view('productos.index',compact('productos'));
    }
}
