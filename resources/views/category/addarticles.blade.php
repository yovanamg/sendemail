@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Informacion Categoría</h1>
      </div>
      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <label for="id" class="col-sm-2 control-label">Id</label>
          <div class="col-sm-4">
            <input 
              type="text" 
              class="form-control" 
              name="id" 
              id="id" 
              value="{{$category->id}}"
              disabled>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-4">
            <input 
              type="text" 
              class="form-control" 
              name="name" 
              id="name" 
              value="{{$category->name}}"
              disabled>
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-12">
        <hr>
        <h1>Articulos</h1>
      </div> 
      <div class="col-md-12">
        <div class="col-md-6" style="padding: 10px">
          <div class="col-md-12" style="border: 1px solid gray">
            <h3 class="col-md-12" style="text-align: center;">Articulos Disponibles</h3>
            <hr>
            <br>
            <div class="col-md-12">
              <div 
                data-spy="scroll" 
                data-target="#navbar-example" 
                style="height: 200px; position: relative; overflow-y: scroll;">
                <table class="table table-striped" id="navbar-example">
                  <thead>
                    <tr>
                      <td>Id</td>
                      <td>Name</td>
                      <td>Código</td>
                      <td>Agregar</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($availableItems as $a)
                    <tr>
                      <td>{{$a->id}}</td>
                      <td>{{$a->name}}</td>
                      <td>{{$a->code}}</td>
                      <td>
                        <a href="{{url('/addartcat')}}/{{$a->id}}/{{$category->id}}" class="btn btn-xs btn-success">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-md-6" style="padding: 10px">
          <div class="col-md-12" style="border: 1px solid gray">
            <h3 class="col-md-12" style="text-align: center;">Mis articulos</h3>
            <hr>
            <br>
            <div class="col-md-12">
              <div 
                data-spy="scroll" 
                data-target="#navbar-example1" 
                style="height: 200px; position: relative; overflow-y: scroll;">
                <table class="table table-striped" id="navbar-example1">
                  <thead>
                    <tr>
                      <td>Id</td>
                      <td>Name</td>
                      <td>Código</td>
                      <td>Eliminar</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($myItems as $b)
                    <tr>
                      <td>{{$b->id}}</td>
                      <td>{{$b->name}}</td>
                      <td>{{$b->code}}</td>
                      <td>
                        <a href="{{url('/deleteartcat')}}/{{$b->id}}/{{$category->id}}" class="btn btn-xs btn-danger">
                          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection






