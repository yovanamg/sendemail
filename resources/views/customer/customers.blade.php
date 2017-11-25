@extends('admin.layouts')

@section('content')
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="/css/users.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script>
    var openModal = function(){
      $(document).ready(function(){ $('#add-customer').modal();});
    }

    var editCustomer = function(customer) {
      $('#btn-save-edit').click(function() {
        document.getElementById('edit-id').action = "/update_customer/" + customer.id;
      });
      
      $(document).ready(function(){
        $('#update-customer').modal();
        $("#edit-name").val(customer.name);
        $("#edit-email").val(customer.email);
        $("#edit-telephone").val(customer.telephone);
        $("#edit-database_id").val(customer.database_id);
        
      });
    };

    var deleteCustomer = function(customer) {
      $('#btn-delete-edit').click(function() {
        document.getElementById('btn-delete-edit').href = "/delete_customer/" + customer.id;
      });
      
      $(document).ready(function(){ $('#delete-customer').modal();});
    };
  </script>
  <div class="row">
    <div 
      class="col s12 m12 l12 right-align btn-add" 
      style="padding-right: 5% !important; margin-top: 2% !important;">
      <label style="padding-right: 10px !important;">Agregar cliente</label>
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
            <th>Empresa</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Base de datos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $a)
            <tr data-id="{{$a->id}}">
              <td>{{$a->name}}</td>
              <td>{{$a->email}}</td>
              <td>{{$a->telephone}}</td>
              <td>{{$a->database_id}}</td>
              <td>
                <a 
                  type="button"
                  class="icons"
                  onclick="editCustomer({{$a}})"> 
                  <i class="material-icons">&#xE254;</i>
                </a> 
                <a 
                  type="button" 
                  class="icons"
                  onclick="deleteCustomer({{$a}})">
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
    class="modal fade width-customer" 
    tabindex="-1" 
    id="add-customer"
    role="dialog"
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
        <p class="title-add">Agregar cliente</p>
      </div>
      <div class="col s12 m12 l12">
        <div class="row">
        <form 
            class="col s12"
            action="{{url('/save_customer')}}" 
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
                  <label for="name">Empresa</label>
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
              <div class="row m-b-0">
                <div class="input-field col s12">
                  <input 
                    id="database_id" 
                    type="text" 
                    name="database_id"
                    class="validate m-b-0">
                  <label for="database_id">Base de datos</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 right-align">
                <button 
                  class="btn btn-cancel"
                  data-dismiss="modal">
                  Cancelar
                </button>
                <button 
                  class="btn btn-save save-hover"
                  type="submit">
                  Guardar
                </button>
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
    id="delete-customer"
    role="dialog" 
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
      <p class="title-add">Desea eliminar este cliente?</p>
      </div>
        <div class="row">
          <div class="col s12 right-align">
            <button 
              class="btn btn-cancel"
              data-dismiss="modal">
              Cancelar
            </button>
            <a 
              class="btn btn-save save-hover" 
              href="{{url('/delete_customer')}}"
              id="btn-delete-edit">
              <span>Eliminar</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div 
    class="modal fade width-customer-edit" 
    tabindex="-1" 
    id="update-customer"
    role="dialog" 
    aria-hidden="true">
    <div class="">
      <div class="col s12 m12 l12 title-user topbar-add">
        <p class="title-add">Editar cliente</p>
      </div>
      <div class="col s12 m12 l12">
        <div class="row">
        <form 
            class="col s12"
            id="edit-id"
            name="formEditUser"
            action="{{url('/update_customer')}}" 
            method="POST">
            <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
            <div class="row">
              <div class="row m-b-0">
                <div style="padding-left: 10px;">
                  <label>Empresa</label>
                </div>
                <div class="col s12">
                  <input 
                    id="edit-name" 
                    type="text" 
                    name="edit-name"
                    class="validate m-b-0">
                </div>
              </div>
              <div class="row m-b-0">
                <div style="padding-left: 10px;">
                  <label>Correo electrónico</label>
                </div>
                <div class="col s12">
                  <input 
                    id="edit-email" 
                    type="email" 
                    name="edit-email"
                    class="validate m-b-0">
                </div>
              </div>
              <div class="row m-b-0">
                <div style="padding-left: 10px;">
                  <label>Teléfono</label>
                </div>
                <div class="col s12">
                  <input 
                    id="edit-telephone" 
                    type="number" 
                    name="edit-telephone"
                    class="validate m-b-0">
                </div>
              </div>
              <div class="row m-b-0">
                <div style="padding-left: 10px;">
                  <label>Base de datos</label>
                </div>
                <div class="col s12">
                  <input 
                    id="edit-database_id" 
                    type="text" 
                    name="edit-database_id"
                    class="validate m-b-0">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 right-align">
                <button 
                  class="btn btn-cancel" 
                  data-dismiss="modal">
                  Cancelar
                </button>
                <button 
                  class="btn btn-save save-hover" 
                  type="submit" 
                  id="btn-save-edit">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection