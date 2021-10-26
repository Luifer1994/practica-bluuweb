@extends('plantilla.plantilla')
@section('contenido')
    <h1>Lista de empleados</h1>
    @if (session('message')) <div class="alert alert-success"> {{ session('message') }} </div> @endif
    <a href="{{ route('empleado.create') }}" type="button" class="btn btn-primary">Registrar empleado</a>
    <hr>
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
                        <button class="btn-success btn-sm">Editar</button>
                        <form method="POST" action="{{ route("empleado.destroy", $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn-sm">Eliminar</bu>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
