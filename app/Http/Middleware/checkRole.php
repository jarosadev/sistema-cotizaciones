<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response as ResponseFacade;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Verifica que el usuario esté autenticado usando Auth facade
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        // Convierte el parámetro de roles en un array si es string
        $roles = is_array($roles) ? $roles : [$roles];

        // Verifica si el usuario tiene alguno de los roles permitidos
        if (!$this->userHasAnyRole($roles)) {
            return ResponseFacade::make('No tienes permiso para acceder a esta página.', 403);
        }

        return $next($request);
    }

    /**
     * Verifica si el usuario tiene alguno de los roles proporcionados.
     *
     * @param array $roles
     * @return bool
     */
    private function userHasAnyRole(array $roles): bool
    {
        // Usando Auth facade explícitamente
        //$user = User::where('id', Auth::id())->with('roles')->first();

        return Auth::user()->role->whereIn('description', $roles)->count() > 0;

        // Alternativa si usas una columna 'role' directamente en la tabla users
        // return in_array(Auth::user()->role, $roles);
    }
}
