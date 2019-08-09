
<?php
plantilla::aplicar();
if($_POST){
    $usuario = $_POST;
    Cuenta_model::guardar($usuario);
    redirect(base_url());
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
    <br><br><br><br><br>
<div class="container">
    <form method= "post" action="" id="form">
        <h3>REGISTRO</h3>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('cedula','Cedula', ['placeholder'=>' ','required'=>'required']); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('correo','Correo', ['placeholder'=>'','required'=>'required']); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('nombre','Nombre', ['placeholder'=>'','required'=>'required']); ?>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('apelido','Apellido', ['placeholder'=>'Ingrese ubicacion...','required'=>'required']); ?>
                    </div>
                </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('fecha_nacimiento','Fecha de nacimiento', ['placeholder'=>'','required'=>'required', 'type'=>'date' ]); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('grupo','Grupo', ['placeholder'=>'','required'=>'required']); ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('user','Usuario', ['placeholder'=>'','required'=>'required']); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('pass','Contraseña', ['placeholder'=>'','required'=>'required', 'type'=>'password']); ?>
                </div>
            </div>
        </div>
        
        <div class="form-row">
        </div>

        <div>
        <button type="submit" class="btn btn-outline-primary"> <i  class="fa fa-user-plus">Registrar</i></button>
        <button type="reset" onclick="return confirm('Seguro de limpiar los campos?')" class="btn btn-outline-warning"><i class="fa fa-eraser">LIMPIAR</i></button>
        </div>

    </form>

</div>
</body>
</html>