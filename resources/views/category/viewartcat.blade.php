@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12" style="padding-right: 5%; padding-left: 5%;">
    <div class="row">
    @foreach($myItems as $a)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="..." alt="...">
          <div class="caption">
            <h3>{{$a->name}}</h3>
            <p>{{$a->description}}</p>
            <div class="col-md-12" style="padding: 0">
              <div class="col-sm-6" style="padding-left: 0">
                <p>Precio  <strong>${{$a->costo}}</strong></p>
              </div>
              <div class="col-sm-6">
              @foreach($articles_units as $b)
                @if($b->article_id === $a->id)
                  @if($b->units > 0)
                    <p>Unidades <strong>{{$b->units}}</strong></p>
                  @endif
                @endif
              @endforeach
              </div>
            </div>
            <hr>
            <p class="text-right">
              <a href="#" class="btn btn-primary" role="button">Ver más</a> 
              <a href="#" class="btn btn-success" role="button" disabled="{{}}">Comprar</a>
            </p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
@endsection