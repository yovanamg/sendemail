@extends('admin.layouts')

@section('content')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="/css/users.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script>
    var openModal = function(){
      $(document).ready(function(){ $('#add-user').modal();});
    }

    var editUser = function() {
      $(document).ready(function(){ $('#update-user').modal();});
    }
    var deleteUser = function() {
      $(document).ready(function(){ $('#delete-user').modal();});
    }
  </script>
  <div class="row">
    <div 
      class="col s12 m12 l12 right-align btn-add" 
      style="padding-right: 5% !important; margin-top: 2% !important;">
      <label style="padding-right: 10px !important;">Agregar usuario</label>
      <a
        type="button"
        class="btn-floating waves-effect waves-light btn modal-trigger"
        style="background: #7c3131;"
        onclick="openModal()">
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
          @foreach($users as $a)
            <tr>
              <td>{{$a->name}}</td>
              <td>{{$a->email}}</td>
              <td>{{$a->telephone}}</td>
              <td>
                <a 
                  type="button"
                  class="icons"
                  data-toggle="modal"
                  data-target="#update-user"
                  href="{{url('/edituser')}}/{{$a->id}}"> 
                  <i class="material-icons">&#xE254;</i>
                </a> 
                <a 
                  type="button" 
                  class="icons"
                  onclick="deleteUser()">
                  <i class="material-icons">&#xE872;</i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col s12 m2 l1"></div>
  </div>

  <!-- Modal -->
  <div 
    class="modal fade width-modal" 
    tabindex="-1" 
    id="add-user"
    role="dialog"
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
        <p class="title-add">Agregar usuario</p>
      </div>
      <div class="col s12 m12 l12">
        <div class="row">
          <form 
            class="col s12"
            action="{{url('/saveuser')}}" 
            method="POST">
            <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
            <div class="row">
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="name" 
                    type="text" 
                    name="name"
                    class="validate m-b-0">
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="email" 
                    type="email" 
                    name="email"
                    class="validate m-b-0">
                  <label for="email">Correo electrónico</label>
                </div>
              </div>
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="telephone" 
                    type="number" 
                    name="telephone"
                    class="validate m-b-0">
                  <label for="telephone">Teléfono</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 right-align">
                <button 
                  class="btn btn-cancel">
                  Cancelar
                </button>
                <button class="btn btn-save save-hover" type="submit">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div 
    class="modal fade width-delete" 
    tabindex="-1" 
    id="delete-user"
    role="dialog" 
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
      <p class="title-add">Desea eliminar este usuario?</p>
      </div>
        <div class="row">
          <div class="col s12 right-align">
            <button 
              class="btn btn-cancel">
              Cancelar
            </button>
            <button class="btn btn-save save-hover">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div 
    class="modal fade width-modal" 
    tabindex="-1" 
    id="update-user"
    role="dialog" 
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
        <p class="title-add">Editar usuario</p>
      </div>
      <div class="col s12 m12 l12">
        <div class="row">
        <form 
            class="col s12"
            action="{{url('/updateuser')}}" 
            method="POST">
            <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
            <div class="row">
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="cDescripcion" 
                    type="text" 
                    name="cDescripcion"
                    class="validate m-b-0">
                  <label for="cDescripcion">Nombre</label>
                </div>
              </div>
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="email" 
                    type="email" 
                    name="cLogin"
                    class="validate m-b-0">
                  <label for="email">Correo electrónico</label>
                </div>
              </div>
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="telephone" 
                    type="number" 
                    name="telephone"
                    class="validate m-b-0">
                  <label for="telephone">Teléfono</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 right-align">
                <button class="btn btn-cancel">Cancelar</button>
                <button class="btn btn-save save-hover">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection