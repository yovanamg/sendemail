@extends('admin.layouts')

@section('content')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/css/users.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="/css/users.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  <div class="row">
    <div class="container">
      <div class="m-t-20 col s12 m12 l12">
        <div class="col s6 m6 l6">
          <label>Base de datos</label>>
          <select class="browser-default">
            <option value="" disabled selected>Selecciona</option>
            @foreach($emisores as $e)
              <option>{{$e->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col s6 m6 l6">
          <label>Templates</label>
          <select class="browser-default">
            <option value="" disabled selected>Selecciona</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>
        <div class="col s6 m6 l6 m-t-20">
          <label>Fecha inicio</label>
          <input type="date">
        </div>
        <div class="col s6 m6 l6 m-t-20">
          <label>Fecha final</label>
          <input type="date">
        </div>
      </div>

      <div class="m-t-20 col s12 m12 l12 right-align">
        
        <button class="btn btn-save">Generar template</button>
        <a 
          href="{{url('/viewreport')}}"
          class="btn btn-save">
          <span>Generar reporte</span>
        </a>
      </div>
    </div>
  </div>

@endsection