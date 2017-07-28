@extends('admin.layouts')

@section('content')
<div class="row">
  <div class="col-md-12" style="padding-right: 5%; padding-left: 5%;">
    <div class="row">
    @foreach($myItems as $a)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="http://eldiariodelanena.com/wp-content/uploads/2016/04/blusas-dama-camisas-bluson-de-chifon-ultima-moda-711411-MLV20547707013_012016-F.jpg">
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
              <a href="{{url('viewproduct')}}/{{$a->id}}" class="btn btn-primary" role="button">Ver más</a> 
              <a href="{{url('orden')}}/{{$a->id}}" class="btn btn-success" role="button">Comprar</a>
            </p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
@endsection