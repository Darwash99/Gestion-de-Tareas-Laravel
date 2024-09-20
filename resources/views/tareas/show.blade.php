<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl ">
            VER TAREA
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="First group">
                </div>
                <div class="input-group">
                    <div class="btn-group" role="group" aria-label="Default button group">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('tareas.create') }}">Agregar Tarea</a>
                                    <a class="dropdown-item" href="{{ route('tareas.pendientes') }}">Tareas Pendientes</a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card border-warning mb-3 text-center">
                                <div class="card-header">{{ strtoupper($tarea->titulo) }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">Vencimiento: {{ $tarea->fecha_vencimiento }}</h5>
                                    <h4 class="card-title">Estado: 
                                        @if ($tarea->completado == 'PENDIENTE')
                                            <span class="text-danger">{{ $tarea->completado }}</span>
                                        @else
                                            <span class="text-success">{{ $tarea->completado }}</span>
                                        @endif
                                    </h4>
                                    <p class="card-text">
                                        Descripción: <span>{{ $tarea->descripcion }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>