@extends('layouts.admin')

@section('content')
    @section('tittleSite','IoT')
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
                            <form class="form-horizontal m-t-30" action="{{url('company')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! $errors->first('name','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" required placeholder="Nombre" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        {!! $errors->first('email','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" name="email" required placeholder="Correo electrónico" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! $errors->first('status_id','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="status_id">Rol de usuario</label>
                                            <select name="status_id" class="form-control" required>
                                                @foreach($status_company as $status_c)
                                                    <option value="{{$status_c->id}}">{{ $status_c->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
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
                                        <a href="{{url('/company')}}">Ver Todos</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
