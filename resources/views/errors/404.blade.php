@extends('layouts.app')

@section('title', 'Recurso no encontrado')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center px-4">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8 text-center">
        <div class="mx-auto h-16 b-16 mb-6">
            <i class="bi bi-exclamation-triangle text-yellow-400 text-5xl"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-800 mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Página no encontrada</h2>
        <p class="text-gray-600 mb-8">
            Lo sentimos, la página que estás buscando no existe o ha sido movida.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{url('/')}}" class="bg-orange-600 hover:bg-orange-700 text-white inline-flex items-center justify-center px-4 py-2 rounded-md">
                <i class="bi bi-house px-1"></i>
                <p class="font-bold">Ir al inicio</p>
            </a>
            <a href="{{ url()->previous() }}" class="border-orange-600 text-orange-600 hover:bg-orange-50 border inline-flex items-center justify-center px-4 py-2 rounded-md">
                <i class="bi bi-arrow-left px-1"></i>
                Volver atrás
            </a>
        </div>
    </div>
    <div class="mt-8 text-center">
        <p class="mt-2 text-sm text-gray-500">
            <img src="{{ asset('images/logo.png') }}" alt="Granjas Orihuela Logo" class="mx-auto h-16" />
            © {{ now()->year }} Granjas Orihuela. Todos los derechos reservados.
        </p>
    </div>
</div>
@endsection