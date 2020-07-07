@extends('layouts.admin')

@section('content')
    @section('tittleSite','IoT 10x Informatica' . auth()->user()->name )
        @section('page_description','Agregar usuario')
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="p-3">
                                    <div class="flash-message" id="success-alert">
                                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                            @if(Session::has('alert-' . $msg))
                                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <form class="form-horizontal m-t-30" action="{{url('users')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! $errors->first('name','<small class="text-danger">:message</small>') !!}
                                                <div class="form-group">
                                                    <label for="username">Nombre</label>
                                                    <input type="text" name="name" required placeholder="Nombre" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                {!! $errors->first('email','<small class="text-danger">:message</small>') !!}
                                                <div class="form-group">
                                                    <label for="username">Correo electrónico</label>
                                                    <input type="email" name="email" required placeholder="Correo electrónico" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! $errors->first('role_id','<small class="text-danger">:message</small>') !!}
                                                <div class="form-group">
                                                    <label for="username">Rol de usuario</label>
                                                    <select name="role_id" class="form-control" required>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{ $role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="text-muted m-b-30">Cambio de Contraseña.  </p>
                                        <!-- Empieza Codigo para Cambio de contraseña -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! $errors->first('password','<small class="text-danger">:message</small>') !!}
                                                <div class="form-group">
                                                    <label for="username">Ingrese Contraseña Nueva</label>
                                                    <input type="password" name="password" id="password" placeholder="" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"value="">
                                                    <span style="margin" id='message'></span>	
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                {!! $errors->first('password','<small class="text-danger">:message</small>') !!}
                                                <div class="form-group">
                                                    <label for="username">Repita Contraseña Nueva</label>
                                                    <input type="password" name="password2" id="password2"  placeholder="" class="form-control {{$errors->has('password2') ? 'is-invalid' : ''}}"value="">				
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- Termina Codigo para Cambio de contraseña -->
                                        <div class="row">
                                            <div class="offset-sm-3 col-sm-6">
                                                <div class="form-group">
                                                    <button type="submit" id="button1" class="btn btn-success btn-block btn-lg  waves-effectk">Guardar <i class="fas fa-save"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <i class="ion-arrow-left-c"></i>
                                                <a href="{{url('/users')}}">Ver Todos</a>
                                            </div>
                                        </div>
                                    </form>
                                    <script>
                                        $('#password, #password2').on('keyup', function () {
                                            if ($('#password').val() == $('#password2').val()) {
                                                $('#message').html('Las Contraseñas son Iguales').css('color', 'green');
                                                $('#button1').prop('disabled', false)
                                            } else {
                                                $('#message').html('Las Contraseñas no Coinciden').css('color', 'red'); 
                                                $('#button1').prop('disabled', true);   
                                            }       
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    @section('sectionJS')
@endsection
