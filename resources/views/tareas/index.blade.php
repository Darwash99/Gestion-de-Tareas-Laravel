<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" >
            TODAS LAS TAREAS
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
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        @if ($tareas->count() > 0)
                            @foreach($tareas as $tarea)
                                <div class="card border-warning mb-3" style="max-width: 18rem;">
                                <div class="card-header">{{ strtoupper($tarea->titulo) }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">vencimiento {{ $tarea->fecha_vencimiento }}</h5>
                                    <h4 class="card-title">Estado: 
                                        @if ($tarea->completado == 'PENDIENTE')
                                            <span class="text-danger">{{ $tarea->completado }}</span>
                                        @else
                                            <span class="text-success">{{ $tarea->completado }}</span>
                                        @endif
                                    </h4>
                                    <p class="card-text">
                                        <details class="open:bg-dark white:open:bg-slate-900 open:ring-1 open:ring-black/5 white:open:ring-dark/10 open:shadow-lg">
                                            <summary class="text-sm font-semibold">
                                                        Ver Descripcion
                                            </summary>
                                            <div class="mt-3 text-sm">
                                                    <p>{{ $tarea->descripcion }}</p>
                                            </div>
                                        </details>

                                    </p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                No hay Ningun Registro
                            </div>
                        @endif
                    </div>
                    {{ $tareas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>