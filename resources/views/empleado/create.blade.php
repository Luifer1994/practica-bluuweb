@extends('plantilla.plantilla')
@section('contenido')
    <h1>Crear usuario</h1>
    <form enctype="multipart/form-data" method="POST" action={{ route('empleado.store') }}>
        @csrf
        <div class="container px-4">
            <div class="row gx-5">
                <div class="col-6 mt-4">
                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6 mt-4">
                    <input class="form-control" type="text" name="apellido_paterno" placeholder="A Paterno" value="{{ old('apellido_paterno') }}">
                    @error('apellido_paterno')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" name="apellido_materno" placeholder="A Materno" value="{{ old('apellido_materno') }}">
                    @error('apellido_materno')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" type="email" name="correo" placeholder="Correo" value="{{ old('correo') }}">
                    @error('correo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" type="file" name="foto">
                    @error('foto')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary mt-4" type="submit">Agregar</button>
        </div>

    </form>


@endsection
