<?php
plantilla::aplicar();

if($_POST){

    $grupo = $_POST;
    Grupo_model::guardar($grupo);
    redirect('admin/add_grupo');
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
      
<h3>AGREGAR GRUPO</h3>


<br>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('nombre','Nombre', ['placeholder'=>' Ingrese nombre...','required'=>'required']); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('id_foto_logo','Foto Logo', ['placeholder'=>' ','required'=>'required']); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('id_foto','Foto', ['placeholder'=>'','required'=>'required']); ?>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('ubicacion','Ubicacion', ['placeholder'=>'Ingrese ubicacion...','required'=>'required']); ?>
                    </div>
                    
                </div>
        </div>

         <div class="form-row">
                <div class="col-md-12 mb-3">
                    <div class='input-group'>
                        <?= asgTextArea('descripcion','Descripcion', ['placeholder'=>'Ingrese descripcion...','required'=>'required']); ?>
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