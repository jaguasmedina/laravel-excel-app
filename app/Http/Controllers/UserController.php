<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los usuarios
        $usuarios = User::all();
        
        // Devuelve la vista con los usuarios
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo usuario
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|in:Administrador,Editor,Lector',
            'activo' => 'required|boolean',
        ]);
        
        // Crea el nuevo usuario
        $usuario = User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rol' => $request->input('rol'),
            'activo' => $request->input('activo'),
        ]);

        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        
        // Muestra los detalles del usuario
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        
        // Muestra el formulario para editar el usuario
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'rol' => 'required|in:Administrador,Editor,Lector',
            'activo' => 'required|boolean',
        ]);
        
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        
        // Actualiza los atributos del usuario
        $usuario->update([
            'rol' => $request->input('rol'),
            'activo' => $request->input('activo'),
        ]);
        
        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el usuario por ID
        $usuario = User::findOrFail($id);
        
        // Desactiva al usuario
        $usuario->update(['activo' => false]);
        
        // Redirige a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado con éxito.');
    }
}
