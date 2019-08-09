<?php
plantilla::aplicar();
session_start();

if(isset($_POST['user'])){
  if(Admin_model::inicio_sesion($_POST['user'], $_POST['pass'])){
    $_SESSION['admin']=true;
    redirect(base_url('admin/sliders'));
    $malpass='';
  }else{
    $malpass = "Credenciales no coinciden";
  }
}else{
  $malpass='';
}
if(isset($_SESSION['admin'])){
  redirect(base_url('admin/sliders'));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-body">
            <h4 class="card-title text-center">INICIAR SESION</h4>
            <form class="form-signin" method="post" action="">
              <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control" name="user" required autofocus>
                <label for="inputUserame">Usuario</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="pass" required>
                <label for="inputPassword">Contraseña</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">iniciar sesión</button>
              <a class="btn btn-lg btn-success btn-block text-uppercase" href="<?=base_url('cuenta/registro')?>">Registrarse</a>
              <hr class="my-4">
              <p><?=$malpass?></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<style>
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background-color: #F5F5F5;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
</style>
</html>