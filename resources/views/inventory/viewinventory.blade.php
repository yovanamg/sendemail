@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Inventario</h1>
      </div>
      <div class="col-md-12 text-right">
        <a href="{{url('/pdfinventory')}}" class="btn btn-danger">
          <span 
            class="glyphicon glyphicon-print" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;PDF
        </a>
        <a href="{{url('/addinventory')}}" class="btn btn-info">
          <span 
            class="glyphicon glyphicon-plus" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;Agregar a inventario
        </a>
        <a href="{{url('/totalarticles')}}" class="btn btn-warning">
          <span 
            class="glyphicon glyphicon-book" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;Totales por articulo
        </a>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre articulo</td>
              <td>Fecha de ingreso</td>
              <td>Piezas</td>
            </tr>
          </thead>
          <tbody>
          @foreach($inventory as $i)
            <tr>
              <td>{{$i->id}}</td>
              <td>{{$i->name}}</td>
              <td>{{$i->date_of_admission}}</td>
              <td>{{$i->units}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection