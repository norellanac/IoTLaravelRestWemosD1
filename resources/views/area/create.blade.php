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
                            <form class="form-horizontal m-t-30" action="{{url('area')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        {!! $errors->first('description','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="description">Descripcion</label>
                                            <input type="text" name="description" required placeholder="Descripcion" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" value="{{old('description')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! $errors->first('status_id','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="status_id">Estado</label>
                                            <select name="status_id" class="form-control" required>
                                                @foreach($status_areas as $status_area)
                                                    <option value="{{$status_area->id}}">{{ $status_area->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        {!! $errors->first('company_id','<small class="text-danger">:message</small>') !!}
                                        <div class="form-group">
                                            <label for="company_id">Empresa</label>
                                            <select name="company_id" class="form-control" required>
                                                @foreach($companies as $comp)
                                                    <option value="{{$comp->id}}">{{ $comp->name}}</option>
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
