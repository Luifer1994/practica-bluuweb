@extends('plantilla.plantilla')
@section('contenido')
    <div class="text-center mt-5">
        <img src="https://yt3.ggpht.com/ytc/AKedOLR66nQtPFSM_-hHyg37qHUtDWMuAPtbgoF6n1WTMA=s88-c-k-c0x00ffffff-no-rj"
            width="100" alt="">
        <h3 class="text-primary">Registro Bluuweb</h3>
    </div>
    <div class="row justify-content-center m-5">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="text" class="form-control my-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" autofocus>
                        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                        <input type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo">
                        @error('email')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror

                        <input type="password" class="form-control my-3 @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                        <input id="password-confirm" type="password" class="form-control my-3" name="password_confirmation" placeholder="Confirmar contraseña">
                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">
                                Registar
                            </button>
                        </div>
                        <div class="d-grid gap-2 mt-2 text-center">
                            <p>Ya tienes cuenta</p>
                            <i class="fas fa-arrow-down"></i>
                            <a href="{{ route("login") }}" type="submit" class="btn btn-primary">
                                Inicia sesión
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
