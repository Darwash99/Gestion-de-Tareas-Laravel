<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl ">
            AGREGAR NUEVA TAREA
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <form id="FormulariocrearTarea">
                        @csrf
                        <div class="input-group mb-3">
                            
                            <span class="input-group-text">Titulo de Tarea</span>
                            <input type="text" class="form-control"  id="titulo" name="titulo">
                            <!--<input type="text" class="form-control" placeholder="Server" aria-label="Server">-->
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Descripci&oacute;n</span>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text">Fecha de Vencimiento</span>
                            <input type="date" class="form-control" placeholder="Titulo de Tarea" id="fecha_vencimiento" name="fecha_vencimiento">
                        </div>
                        <br>
                        <br>
                        
                        <div class="mb-4">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('tareas.pendientes') }}">
                                    <button type="button" class="btn btn-info">Volver</button>
                                </a>
                                <button type="button" class="btn btn-success" onclick="ValidarFormularioTarea()">Crear Tarea</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>