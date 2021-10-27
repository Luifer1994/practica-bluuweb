@extends('plantilla.plantilla') {{-- extiende de la plantilla base --}}
@section('contenido') {{-- section donde renderizara el contenido --}}
    <h1>Lista de empleados</h1>
    {{-- si existe un mensaje recibido del backend muestra esta alerta --}}
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
     @endif
    <a href="{{ route('empleado.create') }}" type="button" class="btn btn-primary">Registrar empleado</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido P</th>
                    <th scope="col">Apellido M</th>
                    <th scope="col">Correo</th>
                    <th scope="col">IMG</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->apellido_paterno }}</td>
                        <td>{{ $item->apellido_materno }}</td>
                        <td>{{ $item->correo }}</td>
                        <td><img src="{{ asset("storage/$item->foto") }}" alt="" width="80"></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                {{-- boton que envia a la ruta edit y como parametro el id del empleado para asi despues mandar la data a la vista edit --}}
                                <a type="button" href="{{ route('empleado.edit', $item->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               {{--  se envia el eliminar por formulario por seguridad
                                aunque tambien se puede enviando solo el id --}}
                                <form method="POST" action="{{ route('empleado.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
