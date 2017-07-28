@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12">
    <br>
     <form 
      action="{{url('/saveorden')}}" 
      method="POST"
      class="form-horizontal" 
      style="margin-right: 25%; margin-left: 15%;">
      <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">

      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            class="form-control" 
            name="name" 
            id="name" 
            value="{{$article->name}}"
            disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="units" class="col-sm-2 control-label">Unidades</label>
        <div class="col-sm-10">
          <input 
            type="number" 
            class="form-control" 
            name="units" 
            id="units"
            value="1"
            disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="total" class="col-sm-2 control-label">Total</label>
        <div class="col-sm-10">
          <input 
            type="number" 
            class="form-control" 
            name="total" 
            id="total"
            value="{{$article->costo}}"
            disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="number" class="col-sm-2 control-label">Numero de tarjeta</label>
        <div class="col-sm-10">
          <input 
            type="number" 
            class="form-control" 
            name="number" 
            id="number"
            value="Numero de tarjeta">
        </div>
      </div>

      <div class="form-group">
        <label for="code" class="col-sm-2 control-label">Código</label>
        <div class="col-sm-10">
          <input 
            type="number" 
            class="form-control" 
            name="code" 
            id="code"
            value="Código de tarjeta">
        </div>
      </div>
      <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Pagar</button>
          <a href="{{url('')}}" class="btn btn-warning">Cacelar</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection