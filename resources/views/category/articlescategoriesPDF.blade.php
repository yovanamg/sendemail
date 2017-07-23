  <div class="row">
    <div class="col-md-12" style="padding: 0 7%">
      <div class="col-md-12">
        <h1>Informacion Categoría</h1>
      </div>
      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <label for="id" class="col-sm-2 control-label">Id</label>
          <div class="col-sm-4">
            <input 
              type="text" 
              class="form-control" 
              name="id" 
              id="id" 
              value="{{$category->id}}"
              disabled>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-4">
            <input 
              type="text" 
              class="form-control" 
              name="name" 
              id="name" 
              value="{{$category->name}}"
              disabled>
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-12">
        <hr>
        <h1>Articulos</h1>
      </div> 
      <div class="col-md-12">
        <div class="col-md-6" style="padding: 10px">
          <div class="col-md-12" style="border: 1px solid gray">
            <h3 class="col-md-12" style="text-align: center;">Mis articulos</h3>
            <hr>
            <br>
            <div class="col-md-12">
              <div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td>Id</td>
                      <td>Name</td>
                      <td>Código</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($myItems as $b)
                    <tr>
                      <td>{{$b->id}}</td>
                      <td>{{$b->name}}</td>
                      <td>{{$b->code}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>