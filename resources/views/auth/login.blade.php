@extends('plantilla.plantilla')
@section('contenido')
    <div class="text-center mt-5">
        <img src="https://yt3.ggpht.com/ytc/AKedOLR66nQtPFSM_-hHyg37qHUtDWMuAPtbgoF6n1WTMA=s88-c-k-c0x00ffffff-no-rj"
            width="100" alt="">
        <h3 class="text-primary">Login Bluuweb</h3>
    </div>
    <div class="row justify-content-center m-5">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="password" class="form-control my-3 @error('password') is-invalid @enderror"
                            name="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="d-grid gap-2 mt-2 text-center">
                        <p>Si no tienes una cuenta registrate</p>
                        <i class="fas fa-arrow-down"></i>
                        <a href="{{ route("register") }}" type="submit" class="btn btn-warning">
                            Regístrarte aquí
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
