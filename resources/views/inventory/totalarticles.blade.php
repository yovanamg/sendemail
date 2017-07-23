@extends('admin.layouts')

@section('content')
  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Inventario total por articulo</h1>
      </div>
      <div class="col-md-12">
      <div class="form-group col-md-12">
        <label for="article_id">Articulos</label>
        <select name="article_id" class="form-control">
          <option value="0">Selecciona un articulo</option>
          @foreach($articles as $a)
          <option value="{{$a->id}}">{{$a->name}}</option>
          @endforeach
        </select>
      </div>
      </div>
    </div>
  </div>
@endsection