<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clientes;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('operador', ['except' => 'index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$perfiles = DB::table('perfiles')->get();
        $clientes = Clientes::Buscador($request->nombre)->orderBy('id', 'asc')->simplepaginate(4);
        
        /**$clientes= Clientes::all();**/
        return view('Clientes.index', compact('clientes'));

        /*return view('Clientes.index', ['clientes' => $clientes]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validar los datos enviados en el formulario
    $this->validate($request, [
        'nombre' => 'required|unique:clientes,nombre',
        'rfc' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
    ]);

    // Crear un nuevo cliente en la base de datos
    $cliente = Clientes::create([
        'nombre' => $request->input('nombre'),
        'rfc' => $request->input('rfc'),
        'direccion' => $request->input('direccion'),
        'telefono' => $request->input('telefono'),
        'email' => $request->input('email'),
    ]);

    // Redirigir al usuario a la página de índice de clientes
    return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view ('clientes.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // Validar los datos enviados en el formulario
    $this->validate($request, [
        'nombre' => 'required|unique:clientes,nombre,'.$id,
        'rfc' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
    ]);

    // Encontrar el perfil a actualizar por su ID
    $clientes = Clientes::find($id);

    // Actualizar los datos del perfil con los valores proporcionados en el formulario
    $clientes->nombre = $request->get("nombre");
    $clientes->rfc = $request->get("rfc");
    $clientes->direccion = $request->get("direccion");
    $clientes->telefono = $request->get("telefono");
    $clientes->email = $request->get("email");

    // Guardar los cambios en la base de datos
    $clientes->save();

    // Redirigir al usuario a la página de índice de perfiles
    return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();

        return redirect()->route('clientes.index');
    }
}
