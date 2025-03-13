@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <div class="flex flex-1">
            <aside class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200">
                {{-- Seleccionar sede --}}
                <x-dashboard-sede :sede=$sede />

                {{-- Barra lateral --}}
                <x-dashboard-bar />

                {{-- Cambiar session --}}
                <div class="p-4 border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST">
                  x   @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="w-full text-left px-4 py-2 flex rounded-md hover:bg-gray-300">
                            <div class="mr-2">
                                <i class="bi bi-box-arrow-left"></i>
                            </div>
                            <span>Cerrar sesión</span>
                        </a>
                    </form>
                </div>
            </aside>

            {{-- Main content --}}
            <main class="flex-1 overflow-y-auto bg-gray-50">
                {{-- Top navigation bar --}}
                <header class="bg-white border-b border-gray-200 p-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-serif font-semibold text-gray-800">Dashboard</h1>

                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <div class="avatar">
                                    <div class="w-9 rounded-full">
                                        <img src="https://plus.unsplash.com/premium_vector-1727953894835-e3945c47a7c0?q=80&w=2360&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            alt="User" />
                                    </div>
                                </div>
                                <button class="btn btn-ghost hidden items-center btn-sm md:flex">
                                    <span class="ml-2 text-sm font-medium">Mi Cuenta</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>

                {{-- Welcome section --}}
                <div class="p-6">
                    <div class="card bg-gradient-to-r from-orange-50 to-orange-100 border-none">
                        <div class="flex flex-col md:flex-row items-center justify-between p-6">
                            <div>
                                <h2 class="text-2xl font-serif font-bold text-gray-800">¡Hola, Bienvenido!</h2>
                                <p class="text-gray-600 mt-1">Aquí puedes gestionar la planilla de empleados</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 pb-6">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-2">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-8000">Empleados</h2>
                                <div class="relative">
                                    <input type="text" 
                                           placeholder="Nombre o dni"
                                           id="search_input"
                                           class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300 focus:border-orange-300 text-sm"
                                    >
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="p-0">
                                    <div class="w-full overflow-hidden">
                                        <div class="max-h-[50vh] md:max-h-[58vh] lg:max-h-[58vh] overflow-y-auto">
                                            <table class="w-full text-sm text-left text-gray-500">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0 z-10">
                                                    <tr>
                                                        <th class="px-4 py-3 sm:px-6">DNI</th>
                                                        <th class="px-4 py-3 sm:px-6">Nombre</th>
                                                        <th class="px-4 py-3 sm:px-6">Rol</th>
                                                        <th class="px-4 py-3 sm:px-6">Status</th>
                                                        <th class="px-4 py-3 sm:px-6">Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < 400; $i++)
                                                        <tr class="hover:bg-gray-100 employee-row">
                                                            <td class="px-4 py-3 sm:px-6 sm:py-4 font-medium text-gray-900">{{ $i }}</td>
                                                            <td class="px-4 py-3 sm:px-6 sm:py-4">Mateo{{ $i }} mateo mateo mateo</td>
                                                            <td class="px-4 py-3 sm:px-6 sm:py-4">Programador</td>
                                                            <td class="px-4 py-3 sm:px-6 sm:py-4">
                                                                <span
                                                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                                    Activo
                                                                </span>
                                                            </td>
                                                            <td class="px-4 py-3 sm:px-6 sm:py-4">
                                                                <i class="bi bi-eye"></i>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            {{--  --}}
                            <div class="p-0">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-semibold text-gray-8000">Total</h2>
                                </div>

                                <div class="w-full overflow-hidden">
                                    <div class="max-h-[50vh] md:max-h-[59vh] lg:max-h-[59vh] overflow-y-auto">
                                        
                                            <div class="space-y-2">
                                                <div class="max-h-[250px]">
                                                    <canvas id="totalEmployeesDoughnutChart"></canvas>
                                                </div>
                                                @php
                                                    $init = 600;
                                                @endphp
                                                @for ($i = 0; $i < 5; $i++)
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center">
                                                        <div class="mr-2 h-3 w-3 rounded-sm bg-orange-{{ $init - ($i * 100) }}"></div>
                                                        <span class="text-sm">Administración</span>
                                                    </div>
                                                    <span class="font-medium">50</span>
                                                </div>
                                                @endfor
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @vite('resources/js/dashboard/dashboard.js')
    @vite('resources/js/dashboard/employee_search.js')
@endsection
