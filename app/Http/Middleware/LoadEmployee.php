<?php

namespace App\Http\Middleware;

use App\Models\Empleado;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LoadEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user) {
            Log::debug('Loading empleado for user', ['user' => $user->id]);
            $empleado = Empleado::with([
                'sede',
                'contrato',
            ])->where('user_id', $user->id)->first();
            Log::debug('Empleado loaded', ['empleado' => $empleado]);
            $request->merge(['empleado' => $empleado]);
        } else {
            Log::debug('No user found', ['user' => $user]);
        }

        return $next($request);
    }
}
