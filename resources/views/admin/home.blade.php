@extends('admin.layouts')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Materialize Select</label>
        </div>
        </div>
      </div>
    </div>

@endsection