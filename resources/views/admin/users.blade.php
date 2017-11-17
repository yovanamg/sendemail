@extends('admin.layouts')

@section('content')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <div class="row">
    <div 
      class="col s12 m12 l12 right-align btn-add" 
      style="padding-right: 5% !important; margin-top: 2% !important;">
      <label style="padding-right: 10px !important;">Agregar usuario</label>
      <a 
        class="btn-floating"
        style="background: #7c3131;"
        href="{{ url('/addUser') }}"
        onclick="">
        <i class="material-icons">add</i>
      </a>
    </div>
    <div class="col s12 m2 l1"></div>
    <div class="col s12 m8 l10">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre usuario</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>6677673939</td>
            <td>
              <i class="material-icons">&#xE254;</i>
              <i class="material-icons">&#xE872;</i>
              </td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>6677673939</td>
            <td>
              <i class="material-icons">&#xE254;</i>
              <i class="material-icons">&#xE872;</i>
            </td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>6677673939</td>
            <td>
              <i class="material-icons">&#xE254;</i>
              <i class="material-icons">&#xE872;</i>
            </td>            
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col s12 m2 l1"></div>
  </div>

@endsection