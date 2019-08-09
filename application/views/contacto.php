<?php
plantilla::aplicar();

if($_POST){

    $contacto = $_POST;
    Cuenta_model::guardar_contacto($contacto);
    redirect('cuenta/contacto');
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
    <br><br><br>
    <br><br>
<div class="container">
<form method= "post" action="" id="form">
<h3>CONTACTO</h3>
<br>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('nombre','Nombre', ['placeholder'=>' Ingrese nombre','required'=>'required']); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('correo','Correo', ['placeholder'=>'Ingrese correo','required'=>'required']); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('telefono','Telefono', ['placeholder'=>'Ingrese telefono','required'=>'required', 'type'=>'tell']); ?>
                    </div>
                </div>
        </div>

        <div class="form-row">
            <div class="col-md-12">
                    <div class='input-group'>
                        <?= asgTextArea('comentario','Comentario', ['placeholder'=>'Ingrese comentario...','required'=>'required']); ?>
                    </div>
                </div>
        </div>
        
        <div class="form-row">
        </div>

        <div>
        <button type="submit" class="btn btn-outline-primary"> <i  class="fa fa-user-plus">Agregar</i></button>
        <button type="reset" onclick="return confirm('Seguro de limpiar los campos?')" class="btn btn-outline-warning"><i class="fa fa-eraser">LIMPIAR</i></button>
        </div>

        </form>

</div>
</body>
</html>