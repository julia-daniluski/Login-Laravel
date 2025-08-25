<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Formulário de criação de usuário
    public function create()
    {
        return view('users.create');
    }

    // Formulário de login
    public function login()
    {
        return view('users.login');
    }

    // Armazena usuário no banco
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.create')->with('success','Usuário criado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Atualiza usuário
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'password' => 'nullable|min:6|confirmed'
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email
        ];

        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.edit', $user->id)->with('success','Usuário atualizado com sucesso!');
    }

    // Autenticação (login)
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.logado');
        }

        return redirect()->route('user.login')->withErrors([
            'email' => 'Credenciais inválidas'
        ]);
    }

    // Área logada
    public function logado()
    {
        return view('users.logado');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    // Redefinição de senha pública
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.login')->with('success', 'Senha atualizada com sucesso!');
    }
}
