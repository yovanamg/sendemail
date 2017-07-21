<div class="row">
  <div class="col-md-12" style="padding: 0 7%">
    <div class="col-md-12">
      <h1>Articulos</h1>
    </div>
    <div class="col-md-12">
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Código</td>
            <td>Precio unitario</td>
            <td>Costo mercado</td>
            <td>Descripción</td>
          </tr>
        </thead>
        <tbody>
        @foreach($article as $a)
          <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->name}}</td>
            <td>{{$a->code}}</td>
            <td>$&nbsp;{{$a->price}}</td>
            <td>$&nbsp;{{$a->costo}}</td>
            <td>{{$a->description}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>