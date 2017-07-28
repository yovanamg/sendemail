@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12" style="padding-right: 5%; padding-left: 5%;">
   <div class="col-md-6">
     <img src="https://www.mytrendyworld.com/ficheros/productos/48010302.jpg">
   </div>
   <div class="col-md-6">
      <h4 class="text-center">Caracteristicas</h4>
      <div class="col-md-6" style="padding: 10px 20px">
        <p style="margin-bottom: 0; font-size: 20px">Modelo</p>
        <label style="margin-bottom: 5px">{{$articles->name}}</label>
        <p style="margin-bottom: 0; font-size: 20px">Descripcion</p>
        <label style="margin-bottom: 5px">{{$articles->description}}</label>
        <p style="margin-bottom: 0; font-size: 20px">Precio unitario</p>
        <label style="margin-bottom: 5px">$&nbsp;{{$costo}}</label>
      </div>
      <div class="col-md-6">
        <a 
          href="{{url('orden')}}/{{$articles->id}}" 
          class="btn btn-success" 
          role="button" 
          style="margin-top: 50%;">
          Comprar
        </a>
      </div>
   </div>
  </div>
  <div class="col-md-12">
    <hr>
    <h2 class="text-center">Califica el articulo</h2>
    <hr>
    <br>
  </div>
  <div class="col-md-12" style="border-top: 2px solid gray; padding-top: 20px">
    <form action="{{url('commentary')}}/{{$articles->id}}" 
          method="POST">
      <input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
      <div class="col-md-6 text-center" style="padding: 0px; margin-top: 25px;">
        <select name="stars" style="width: 30%; font-size: 20px; font-weight: 500;">
          <option selected disabled>Califica articulo</option>
          <option value="1">1 estrella</option>
          <option value="2">2 estrellas</option>
          <option value="3">3 estrellas</option>
          <option value="4">4 estrellas</option>
          <option value="5">5 estrellas</option>
        </select>
      </div>
      <div class="col-md-6" style="padding: 0px">
        <div class="text-right" style="padding-right: 30%">
          <label>{{ Auth::guard('web_admin')->user()->email }}</label>
          <input type="hidden" name="email" value="{{ Auth::guard('web_admin')->user()->email }}">
        </div>
        <div class="form-group" style="margin: 5px 20px">
          <label class="control-label" for="inputLarge">Escribe tu comentario</label>
          <input class="form-control input-lg" name="commentary" type="text" id="inputLarge">
        </div>
      </div>
      <div class="text-right" style="margin: 0px 10px">
        <button 
          type="submit" 
          class="btn btn-success" 
          style="margin-top: 15px; margin-right: 10px">
          Enviar
        </button>
      </div>
    </form>
  </div>
  <div class="col-md-12">
    <hr>
    <h2 class="text-center">Comentarios</h2>
    <hr>
    <br>
  </div>
  <div class="col-md-10" style="padding-left: 20%">
    @foreach($comments as $c)
      @if($c->article_id == $articles->id)
      <div class="col-md-12 text-center" style="border-bottom: 1px dashed gray;">
        <div class="col-md-6 text-center" style="padding: 10px">
          <strong>Puntaje: &nbsp;&nbsp;</strong><label style="color: #e0b846">{{$c->stars}}&nbsp; Estrellas</label>
        </div>
        <div class="col-md-6" style="padding: 10px">
          <p style="margin-bottom: 0; font-size: 20px">Usuario:</p>
          <label>{{$c->email}}</label>
          <p style="margin-bottom: 0; font-size: 20px">Comentario:</p>
          <label>{{$c->commentary}}</label>
        </div>
        <br>
      </div>
      @endif
    @endforeach
    <hr>
  </div>
</div>
@endsection