<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contraseña' => ['required', Rules\Password::defaults()],
            'dni' => ['required', 'string', 'lowercase', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'correo' => ['nullable', 'email', 'max:255', 'unique:users'],
            'celular' => ['nullable', 'numeric', 'digits:9'],
            'nacimiento' => ['nullable', 'date'],
        ]);
        try {
            $user = \App\Models\User::create([
                'password' => Hash::make($request->str('contraseña')),
                'dni' => $request->str('dni'),
                'apellidos' => $request->str('apellidos'),
                'nombres' => $request->str('nombres'),
                'correo' => $request->str('correo'),
                'celular' => $request->str('celular'),
                'nacimiento' => $request->date('nacimiento'),
            ]);
        } catch (\Exception $e) {
            Log::info('Error al registrar al usuario: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Correo o dni ya registrados']);
        }

        $user->assignRole(RolesEnum::EXTERNO);
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));

    }
}
