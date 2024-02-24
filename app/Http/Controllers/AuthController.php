<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Verifica se o perfil já está ativo em outro dispositivo
            if ($this->isProfileActiveOnAnotherDevice()) {
                Auth::logout(); // Desconecta o usuário
                return redirect('/login')->withErrors(['message' => 'O perfil já está ativo em outro dispositivo.']); // Redireciona com a mensagem de erro
            }

            // Autenticação bem-sucedida
            return redirect()->intended('/dashboard');
        } else {
            // Incrementa o número de tentativas de login
            if (Auth::validate($credentials)) {
                $user = Auth::getLastAttempted();
                $user->login_attempts += 1;
                $user->save();
            }

            return redirect()->back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);
        }
    }


    // Método para verificar se o perfil do usuário está ativo em outro dispositivo
    protected function isProfileActiveOnAnotherDevice()
    {
        // Obtém o ID de usuário autenticado
        $userId = Auth::id();

        // Verifica se o usuário está autenticado e se há uma sessão ativa para esse usuário em outro dispositivo
        if ($userId && session()->get("user_id_$userId") !== null) {
            return true; // Se sim, o perfil está ativo em outro dispositivo
        }

        return false; // Caso contrário, o perfil não está ativo em outro dispositivo
    }

}
