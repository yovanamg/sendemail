 <div class="row">
  <div class="col-md-12" style="padding: 0 7%">
    <div class="col-md-12">
        <h1>Categorías</h1>
      </div>
      <div class="col-md-12">
        <hr>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre</td>
            </tr>
          </thead>
          <tbody>
          @foreach($categories as $a)
            <tr>
              <td>{{$a->id}}</td>
              <td>{{$a->name}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>