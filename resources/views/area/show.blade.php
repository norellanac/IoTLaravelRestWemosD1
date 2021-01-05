@extends('layouts.admin')

@section('content')
  @section('tittleSite','IoT')
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">
            <div class="flash-message" id="success-alert">
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
              @endforeach
            </div>
            <table id="datatable-buttons" class="text-center table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>descripcion</th>
                  <th>Empresa</th>
                  <th>Estado</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>{{ $areas->id }}</a></td>
                    <td>{{ $areas->description }}</td>
                    <td>{{ $areas->companies->name }}</td>
                    <td>{{ $areas->status->description }}</td>
                    <td> <a href="{{url('area/'. $areas->id .'/edit')}}" class="btn btn-outline-primary"> Editar <i class="mdi mdi-square-edit-outline"></i>   </a> </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
