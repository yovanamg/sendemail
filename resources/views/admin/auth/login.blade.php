@extends('master')

@section('contenido')
<style>

.btn-login {
  background: #7D3030 !important;
  text-transform: none;
  border-radius: 25px;
  letter-spacing: 1px;
}
.width-image {
  max-width: 30%;
}
.recover-password {
 color: #635f5f;
}
.m-b-0 {
  margin-bottom: 0 !important;
}
.m-l-25 {
  margin-left: 25% !important;
}
.m-l-50 {
  margin-left: 50% !important;
}
.m-l-40 {
  margin-left: 40% !important;
}
</style>
<div class="container">
  <div class="row">
      <form class="col s12" role="form" method="POST" action="{{ url('/admin_login') }}">
        {{ csrf_field() }}
        <div class="row center-align">
          <img src="img/logo-grande.jpeg" class="width-image">
        </div>
        <div class="row m-b-0">
          <div class="input-field col s6 m-l-25 {{ $errors->has('email') ? ' has-error' : '' }}">
            <input 
              id="email" 
              type="email" 
              name="email"
              value="{{ old('email') }}"
              required
              class="validate">
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            <label for="email">Correo electrónico</label>
          </div>
        </div>
        <div class="row m-b-0">
          <div class="input-field col s6 m-l-25 {{ $errors->has('password') ? ' has-error' : '' }}">
            <input 
              id="password"
              type="password" 
              class="validate"
              name="password" 
              required>
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            <label for="password">Contraseña</label>
          </div>
        </div>
        <div class="row m-l-50">
          <a href="{{ url('/admin_password/reset') }}" class="recover-password">
            Recuperar contraseña
          </a>
        </div>
        <div class="row ">
          <div class="col s6 m-l-40">
            <button type="submit" class="btn btn-login">Entrar</button>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection