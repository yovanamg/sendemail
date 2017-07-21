@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Categorías</h1>
      </div>
      <div class="col-md-12 text-right">
        <a href="{{url('/pdfcategories')}}" class="btn btn-warning">
          <span 
            class="glyphicon glyphicon-print" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;PDF
        </a>
        <a href="{{url('/addcategory')}}" class="btn btn-info">
          <span 
            class="glyphicon glyphicon-plus" 
            aria-hidden="true"
            style="vertical-align: initial;"></span>
          &nbsp;&nbsp;Agregar categorías
        </a>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre</td>
              <td>Acciones</td>
            </tr>
          </thead>
          <tbody>
          @foreach($categories as $a)
            <tr>
              <td>{{$a->id}}</td>
              <td>{{$a->name}}</td>
              <td>
                <a href="{{url('/editcategory')}}/{{$a->id}}" class="btn btn-xs btn-primary">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>  
                <a href="{{url('/deletecategory')}}/{{$a->id}}" class="btn btn-xs btn-danger">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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