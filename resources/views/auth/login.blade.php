@extends('layouts.dependencias')

@section('content')
  <div class="container">
    <div class="card-body">

      <h3 class="text-center m-0">
        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a>
      </h3>

      <div class="p-3">
        <h4 class="text-muted font-18 m-b-5 text-center">Bienvenido!</h4>
        <p class="text-muted text-center">Inicie Sesion para Continuar</p>

        <form method="POST" class="form-horizontal m-t-30" action="{{url('/login')}}">
          @csrf
          <div class="form-group">
            <label for="username">Email</label>
            <input type="email" name="email" id="username" placeholder="Ingrese Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="userpassword">Password</label>
              <input type="password" name="password"  id="userpassword" placeholder="Ingrese Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group row m-t-20">
                <div class="col-6">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember me</label>
                  </div>
                </div>
                <div class="col-6 text-right">
                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                </div>
              </div>
              <div class="form-group m-t-10 mb-0 row">
                <div class="col-12 m-t-20">
                  <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Olvidaste tu contraseña') }}
                    </a>
                  @endif</a>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <div class="m-t-40 text-center">
          <p class="text-white-50">No tiene una Cuenta? <a href="" class="text-white"> Registrate Ahora </a> </p>
          <p class="text-muted">© 2019. Creado Por<i class="mdi mdi-heart text-danger"></i> 10x Informatica</p>
      </div>

    @endsection
