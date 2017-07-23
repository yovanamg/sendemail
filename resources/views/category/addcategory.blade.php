@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12">
    <br>
     <form 
      action="{{url('/savecategory')}}" 
      method="POST"
      class="form-horizontal" 
      style="margin-right: 25%; margin-left: 15%;">
      <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            class="form-control" 
            name="name" 
            id="name" 
            placeholder="Nombre">
        </div>
      </div>
      <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Agregar</button>
          <a href="{{url('/viewcategories')}}" class="btn btn-warning">Regresar</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection