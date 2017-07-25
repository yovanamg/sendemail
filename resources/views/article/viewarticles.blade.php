@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1 style="margin: 0">Articulos</h1>
      </div>
      <div class="col-md-12 text-right">
        <a href="{{url('/pdfarticles')}}" class="btn btn-warning">
          <span 
            class="glyphicon glyphicon-print" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;PDF
        </a>
        <a href="{{url('/addarticle')}}" class="btn btn-info">
          <span 
            class="glyphicon glyphicon-plus" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;Agregar artículo
        </a>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre</td>
              <td>Código</td>
              <td>Precio unitario</td>
              <td>Costo mercado</td>
              <td>Descripción</td>
              <td>Acciones</td>
            </tr>
          </thead>
          <tbody>
          @foreach($articles as $a)
            <tr>
              <td>{{$a->id}}</td>
              <td>{{$a->name}}</td>
              <td>{{$a->code}}</td>
              <td>$&nbsp;{{$a->price}}</td>
              <td>$&nbsp;{{$a->costo}}</td>
              <td>{{$a->description}}</td>
              <td>
                <a href="{{url('/editarticle')}}/{{$a->id}}" class="btn btn-xs btn-primary">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>  
                <a href="{{url('/deletearticle')}}/{{$a->id}}" class="btn btn-xs btn-danger">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                <a href="{{url('/comments')}}/{{$a->id}}" class="btn btn-xs btn-info">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection