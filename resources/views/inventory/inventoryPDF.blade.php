  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Inventario</h1>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre articulo</td>
              <td>Fecha de ingreso</td>
              <td>Piezas</td>
            </tr>
          </thead>
          <tbody>
          @foreach($inventory as $i)
            <tr>
              <td>{{$i->id}}</td>
              <td>{{$i->name}}</td>
              <td>{{$i->date_of_admission}}</td>
              <td>{{$i->units}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>