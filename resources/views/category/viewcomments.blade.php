@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1 style="margin: 0">Comentarios &nbsp;{{$article->name}} </h1>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Email</td>
              <td>Puntaje</td>
              <td>Comentario</td>
              <td>Acciones</td>
            </tr>
          </thead>
          <tbody>
          @foreach($comments as $a)
            @if($a->article_id == $article->id)
            <tr>
              <td>{{$a->id}}</td>
              <td>{{$a->email}}</td>
              <td>{{$a->stars}}</td>
              <td>{{$a->commentary}}</td>
              <td> 
                <a href="{{url('/deletecommentary')}}/{{$a->id}}" class="btn btn-xs btn-danger">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
            @endif
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection