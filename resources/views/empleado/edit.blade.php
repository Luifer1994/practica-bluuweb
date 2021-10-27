@extends('plantilla.plantilla') {{-- extiende de la plantilla base --}}
@section('contenido') {{-- section donde renderizara el contenido --}}
    <h1>Editar empleado</h1>
    {{-- enviamos el formulario a la ruta update y pasamos como parametro el id del empleado --}}
    <form enctype="multipart/form-data" method="POST" action={{ route('empleado.update', $empleado->id) }}>
        @csrf
        @method('PUT') {{-- esta directriz le dice a laravel que viajara por put --}}
        <div class="container px-4">
            <div class="row gx-5">
                <div class="col-6 mt-4">
                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{ $empleado->nombre }}">
                   {{--  se mostrara si falla la validacion de este campo --}}
                    @error('nombre')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6 mt-4">
                    <input class="form-control" type="text" name="apellido_paterno" placeholder="A Paterno" value="{{ $empleado->apellido_paterno }}">
                    {{--  se mostrara si falla la validacion de este campo --}}
                    @error('apellido_paterno')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" name="apellido_materno" placeholder="A Materno" value="{{ $empleado->apellido_materno }}">
                    {{--  se mostrara si falla la validacion de este campo --}}
                    @error('apellido_materno')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" type="email" name="correo" placeholder="Correo" value="{{ $empleado->correo }}">
                    {{--  se mostrara si falla la validacion de este campo --}}
                    @error('correo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-4">
                    <input class="form-control" type="file" name="foto">
                    {{--  se mostrara si falla la validacion de este campo --}}
                    @error('foto')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Mostrar la foto que tiene el emplo actualmente --}}
                <div class="col-6 mt-4">
                    <img src="{{ asset("storage/$empleado->foto") }}" alt="" width="120">
                    <h4>Foto actual</h4>
                </div>
            </div>
            <button class="btn btn-primary mt-4" type="submit">Actualizar</button>
        </div>

    </form>


@endsection
