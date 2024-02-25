<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificarComportamento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // Regra: Não é possível ter o perfil em 2 dispositivos diferentes
            if ($user->devices()->count() > 1) {
                return redirect('/login')->withErrors(['message' => 'Não é possível ter o perfil em 2 dispositivos diferentes.']);
            }

            // Regra: Não é possível tentar acessar o sistema mais de 2 vezes consecutivas com a senha errada
            if ($user->login_attempts > 2) {
                return redirect('/login')->withErrors(['message' => 'Não é possível tentar acessar o sistema mais de 2 vezes consecutivas com a senha errada.']);
            }else{
                
            }
        } else {
            // Se o usuário não estiver autenticado, redirecione para a página de login
            return redirect('/login');
        }

        return $next($request);
    }
}
