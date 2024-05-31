<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RegistroBienvenida;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['except'=>'index']);
     }
    public function index(Request $request)
    {
        // Recuperar todos los usuarios
        $usuarios = Usuario::Buscador($request->name)->orderBy('id', 'asc')->simplepaginate(2);
        $perfiles = Perfil::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        
        // Pasar los usuarios a la vista
        return view('usuarios.index', compact('usuarios','perfiles'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'idperfil' => 'required|exists:perfiles,id',
        ]);

        try {
            // Create the user
            $usuario = Usuario::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'idperfil' => $validatedData['idperfil'],
            ]);
            $nombrePerfil = Perfil::where('id', $usuario->idperfil)->value('nombre');
            $nombreUsuario = $usuario->name;
            Mail::to($usuario->email)->send(new RegistroBienvenida($nombrePerfil,$nombreUsuario));
            // Redirect to the index route with a success message
            return redirect()->route('usuarios.index')->with('success', 'Usuario created successfully.');

        } catch (\Exception $e) {
            // Log the exception and redirect back with an error message
            Log::error('Error creating user: ' . $e->getMessage());




            
            return redirect()->back()->withErrors('There was an error creating the user. Please try again.');
        }
    }
    public function edit($id)
    {
        // Buscar el usuario por ID
        $usuario = Usuario::findOrFail($id);
        $perfiles = Perfil::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        
        // Pasar el usuario y los perfiles a la vista de edición
        return view('usuarios.edit', compact('usuario', 'perfiles'));
    }

    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'idperfil' => 'required|exists:perfiles,id',
        ]);

        try {
            // Encontrar el usuario y actualizar los datos
            $usuario = Usuario::findOrFail($id);
            $usuario->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'idperfil' => $validatedData['idperfil'],
            ]);

            // Actualizar la contraseña si se proporcionó una nueva
            if(isset($validatedData['password'])){
                $usuario->update([
                    'password' => Hash::make($validatedData['password']),
                ]);
            }

            // Redirigir a la ruta de índice con un mensaje de éxito
            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');

        } catch (\Exception $e) {
            // Registrar la excepción y redirigir con un mensaje de error
            Log::error('Error al actualizar usuario: ' . $e->getMessage());

            return redirect()->back()->withErrors('Hubo un error al actualizar el usuario. Por favor, inténtelo de nuevo.');
        }
    }
    public function destroy($id)
{
    try {
        // Encontrar el usuario por ID y eliminarlo
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        // Redirigir a la ruta de índice con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');

    } catch (\Exception $e) {
        // Registrar la excepción y redirigir con un mensaje de error
        Log::error('Error al eliminar usuario: ' . $e->getMessage());

        return redirect()->back()->withErrors('Hubo un error al eliminar el usuario. Por favor, inténtelo de nuevo.');
    }
}
    }
