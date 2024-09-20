<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" >
            LISTA DE TAREAS PENDIENTES
        </h2>
    </x-slot>


    <!--  MODAL CONFIRMAR TAREA COMPLETADA-->
    <div class="modal fade" id="ModalCompletartarea" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Completar Tarea</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Esta Seguro de Completar la Tarea?, este proceso no se podra revertir.
                    <input type="hidden" id="idtareaacompletar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="button" onclick="TareaCompletada()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN   MODAL CONFIRMAR TAREA COMPLETADA-->
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="completartarea{{$tarea->id}}" onclick="Confirmarcompletadotarea({{$tarea->id}})">
                                        <label class="form-check-label" for="completartarea">
                                            COMPLETAR TAREA
                                        </label>
                                    </div>
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
    <script>
        @if(session('errorconfirmar'))
            MostrarNotificacion('errorcodigo', '{{ session('errorconfirmar') }}')
        @endif
        @if(session('successconfirmar'))
            MostrarNotificacion('successtarea', '{{ session('successconfirmar') }}')
        @endif
    </script>
</x-app-layout>