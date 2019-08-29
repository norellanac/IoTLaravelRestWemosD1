@extends('layouts.roles.SuperAdmin')

@section('content')
  @section('page_title','Registros')
  @section('page_description','Bitacora de registros')
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
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>String1</th>
                  <th>String2</th>
                  <th>String3</th>
                  <th>number1</th>
                  <th> number2</th>
                  <th>number3</th>
                  <th>fecha</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $record)
                  <tr>
                    <td><a href="{{url('users/'.$record->id)}}">{{ $record->id }}</a></td>
                    <td>{{ $record->string1 }}</td>
                    <td>{{ $record->string2 }}</td>
                    <td>{{ $record->string3 }}</td>
                    <td>{{ $record->number1 }}</td>
                    <td>{{ $record->number2 }}</td>
                    <td>{{ $record->created_at }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
