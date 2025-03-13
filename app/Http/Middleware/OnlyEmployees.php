<?php

namespace App\Http\Middleware;

use App\Models\Empleado;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyEmployees
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $empleado = Empleado::where("user_id", $user->id)->first();

        if (!$empleado) {
            return response()->view('dashboard.invitado');
        }
        view()->share('empleado', $empleado);

        return $next($request);
    }
}
