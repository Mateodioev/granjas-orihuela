@extends('layouts.app')

@section('title', 'Granjas Orihuela - Registro de usuario')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 flex flex-col relative">
    <div class="absolute inset-0 bg-cover bg-center z-0"
    style="background-image: url('{{ asset('images/register-bg.jpg') }}'); filter: brightness(0.9) blur(1px);">
    </div>

    <main class="flex-1 flex items-center justify-center p-4 relative z-10">
        <div class="card w-full max-w-md shadow-lg bg-white/95 backdrop-blur p-4">
            <div class="space-y-1 flex flex-col items-center">
                <div class="mx-auto mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Granjas Orihuela logo" class="h-16">
                </div>
                <div class="card-title text-2xl font-serif text-center">Crear cuenta</div>
                <p class="text-gray-500 text-sm text-center">Regístrate para acceder al sistema</p>
            </div>
            <div class="w-full">
                <form action="{{ route('register') }}" method="POST" class="space-y-4 py-4">
                    @csrf
                    <div id="part_1" class="space-y-4">
                        {{-- DNI --}}
                        <div class="space-y-2">
                            <label for="dni" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                DNI
                            </label>
                            <div class="relative">
                                <input type="text" name="dni" id="dni" placeholder="11111111"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('dni') }}" required autofocus>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-card-text"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Contraseña --}}
                        <div class="space-y-2">
                            <label for="contraseña" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Contraseña
                            </label>
                            <div class="relative">
                                <input type="password" name="contraseña" id="contraseña" placeholder="••••••••"
                                class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('contraseña') }}" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-key"></i>
                                </div>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Nombres --}}
                        <div class="space-y-2">
                            <label for="nombres" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Nombres
                            </label>
                            <div class="relative">
                                <input type="text" name="nombres" id="nombres" placeholder="Juan"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('nombres') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Apellidos --}}
                        <div class="space-y-2">
                            <label for="apellidos" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Apellidos
                            </label>
                            <div class="relative">
                                <input type="text" name="apellidos" id="apellidos" placeholder="Perez"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('apellidos') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="siguiente_btn"
                            class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                            Siguiente
                        </button>
                    </div>
                    <div id="part_2" class="space-y-4" hidden>
                        {{-- Nacimiento --}}
                        <div class="space-y-2">
                            <label for="nacimiento" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Fecha de nacimiento
                            </label>
                            <div class="relative">
                                <input type="date" name="nacimiento" id="nacimiento" placeholder="Fecha nacimiento"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('nacimiento') }}" autocomplete="bday"
                                max="{{ Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-cake2"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Correo --}}
                        <div class="space-y-2">
                            <label for="correo" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Correo electrónico
                            </label>
                            <div class="relative">
                                <input type="email" name="correo" id="correo" placeholder="tu@example.com"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('correo') }}" autocomplete="email">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Celular --}}
                        <div class="space-y-2">
                            <label for="celular" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                                Celular
                            </label>
                            <div class="relative">
                                <input type="text" name="celular" id="celular" placeholder="987654321"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-black"
                                value="{{ old('celular') }}" autocomplete="tel-national">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="bi bi-telephone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <button type="button" id="retroceder_btn"
                                class="w-full bg-gray-500 text-white py-2 rounded-md hover:bg-gray-600 transitio duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Retroceder
                            </button>
                            <button type="submit"
                                class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transitio duration-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                Registrarme
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col space-y-2">
                <div class="text-sm text-center text-gray-500">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('index', ['display_login' => 1]) }}" class="text-orange-500 hover:text-orange-600 font-medium    ">Inicia sesión</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-6 text-center text-white text-xs relative z-10">
        <div class="container mx-auto">
            <p>© 2025 Granjas Orihuela. Todos los derechos reservados.</p>
        </div>
    </footer>
</div>

@vite('resources/js/register.js')
@endsection