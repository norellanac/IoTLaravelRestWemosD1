@extends('layouts.admin')

@section('content')
  @section('tittleSite','IoT 10x Informatica' . auth()->user()->name )
  @section('page_description','Bitacora de registros')
  <style type="text/css">

  .shop-card {
    background: #f5f5f5;
    box-shadow: 0 10px 20px rgba(0,0,0,.3);
    overflow: hidden;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
  }

  </style>
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">

            <h3 class="text-center m-0">
              <a href="index.html" class="logo logo-admin"><img src="https://image.flaticon.com/icons/png/512/1289/1289440.png" height="30" alt="logo"></a>
            </h3>

            <div class="p-3">
              <h4 class="text-muted font-18 m-b-5 text-center">Agragar un dispositivo</h4>
              <p class="text-muted text-center"></p>

              <form class="form-horizontal m-t-30" action="{{url('device')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text"  id="name" name="name" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text"  id="description" name="description" placeholder="Descripción" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>
                      @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>





                      <div class="row">
                        <div class="form-group col-6">
                          <label for="location">Ubicación</label>
                          <input type="text"  id="location"  name="location" placeholder="Ubicación" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location" autofocus>
                            @error('location')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>

                        <div class="form-group col-6">
                          <label for="custom_id">id personalizado</label>
                          <input type="number"  id="custom_id"  name="custom_id" placeholder="id personalizado" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location" autofocus>

                            @error('location')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                      </div>

                        <div class="form-group row m-t-20">
                          <div class="col-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Guardar</button>
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
        @section('sectionJS')
        @endsection
