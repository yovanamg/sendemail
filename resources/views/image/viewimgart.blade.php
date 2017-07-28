@extends('admin.layouts')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
      <div class="panel-heading">Subir imagen</div>
        <div class="panel-body">
          <form method="POST" action="http://localhost:8000/sendemail/public/img" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label for="recurso">Articulos</label>
              <select name="article_id" class="form-control">
                <option value="0">Selecciona un articulo</option>
                @foreach($articles as $r)
                <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Imagen</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4" style="margin-top: 10px">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection