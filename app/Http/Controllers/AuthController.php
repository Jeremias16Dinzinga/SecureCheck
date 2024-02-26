<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

            // Verifica se o usuário já possui dispositivos associados
            $user = Auth::user();
            if ($user->devices()->count() == 0) {

                // Verifica se é necessário redefinir o contador de tentativas de login                    
                if ($this->needsResetLoginAttempts($user)) {
                    $user->login_attempts = 0;
                    $user->save();
                }
                if ($user->login_attempts <= 2) {
                    $device = new Device();
                    $device->name = $this->generateRandomDeviceName();
                    $user->devices()->save($device);
                    return redirect()->intended('/home');
                } else {
                    return redirect('/login')->withErrors(['message' => 'Não é possível tentar acessar o sistema mais de 2 vezes consecutivas com a senha errada. Aguarde 10 Minuntos']);
                }

            } else {
                return redirect('/login')->withErrors(['message' => 'O perfil já está ativo em outro dispositivo.']);
            }

        } else {
            $email = $request->input('email');
            $user = User::where('email', $email)->first();


            if ($user && $user->devices()->count() != 0) {
                return redirect('/login')->withErrors(['message' => 'O perfil já está ativo em outro dispositivo.']);
            } else {
                if (!(Auth::validate($credentials))) {
                    //$user = Auth::getLastAttempted();

                    if ($user) {
                        $user->login_attempts += 1;
                        $user->save();
                    }
                }
                if ($user && $user->login_attempts > 2) {
                    return redirect('/login')->withErrors(['message' => 'Não é possível tentar acessar o sistema mais de 2 vezes consecutivas com a senha errada. Aguarde 10 Minuntos']);
                } else {
                    return redirect()->back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);

                }
            }

        }
    }

    // Método para verificar se é necessário redefinir o contador de tentativas de login
    protected function needsResetLoginAttempts($user)
    {
        $now = Carbon::now();
        $difference = $now->diffInMinutes($user->updated_at);
        return $difference > 2;
    }

    public function logout(Request $request)
    {
        // Remover dispositivo associado ao usuário
        $user = Auth::user();
        if ($user) {
            $user->devices()->delete();
        }

        Auth::logout();

        return redirect('/login');
    }

    // Método para gerar um nome aleatório para o dispositivo
    protected function generateRandomDeviceName()
    {
        return 'Device_' . Str::random(8);
    }
}
