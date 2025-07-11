<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Verifica se é admin
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Acesso negado.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $usuarios = User::where('role', '!=', 'admin')->get(); // mostra só quem não é admin
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:profissional,recepcionista',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }
}
