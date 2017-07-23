@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12">
    <br>
     <form 
      action="{{url('/saveinventory')}}" 
      method="POST"
      class="form-horizontal" 
      style="margin-right: 25%; margin-left: 15%;">
      <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">

      <div class="form-group col-md-12">
        <label for="article_id">Articulos</label>
        <select name="article_id" class="form-control">
          <option value="0">Selecciona un articulo</option>
          @foreach($articles as $a)
          <option value="{{$a->id}}">{{$a->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="date_of_admission">Fecha de ingreso</label>
        <div>
          <input 
            type="text" 
            class="form-control" 
            name="date_of_admission" 
            id="date_of_admission" 
            value="{{$date}}"
            disabled>
        </div>
      </div>

      <div class="form-group col-md-6" style="margin-left: 5px; padding-right: 0">
        <label for="units">Fecha de ingreso</label>
        <div>
          <input 
            type="number" 
            class="form-control" 
            name="units" 
            id="units"
            placeholder="Unidades">
        </div>
      </div>

      <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Agregar</button>
          <a href="{{url('/viewinventory')}}" class="btn btn-warning">Regresar</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection