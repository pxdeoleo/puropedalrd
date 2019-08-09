<?php
plantilla::aplicar();

if($_POST){
    $grupo = $_POST;
    Grupo_model::guardar($grupo);
    redirect('admin/');
}


$grupo=new stdClass;
$grupo->id_grupo='';
$grupo->nombre='';
$grupo->id_foto_logo='';
$grupo->id_foto='';
$grupo->ubicacion='';
$grupo->descripcion='';

if (isset($id_grupo)) {
    $rs = Grupo_model::grupo_x_id($id_grupo);
    if (count($rs) > 0) {
        $grupo = $rs[0];
    }
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

   
<h3>EDITAR GRUPO</h3>

<input type="hidden" name="id_grupo" value="<?=$grupo->id_grupo?>">


<br>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('nombre','Nombre', ['placeholder'=>' Ingrese nombre...','required'=>'required','value'=>$grupo->nombre]); ?>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class='input-group'>
                    <?= asgInput('id_foto_logo','Foto Logo', ['placeholder'=>' ','required'=>'required','value'=>$grupo->id_foto_logo]); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('id_foto','Foto', ['placeholder'=>'','required'=>'required', 'type'=>'tell','value'=>$grupo->id_foto]); ?>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class='input-group'>
                        <?= asgInput('ubicacion','Ubicacion', ['placeholder'=>'Ingrese ubicacion...','required'=>'required','value'=>$grupo->ubicacion]); ?>
                    </div>

                </div>
        </div>

         <div class="form-row">
                <div class="col-md-12 mb-3">
                    <div class='input-group'>
                        <?= asgTextArea('descripcion','Descripcion', ['placeholder'=>'Ingrese descripcion...','required'=>'required','value'=>$grupo->descripcion]); ?>
                    </div>
                </div>
        </div>
        
        <div class="form-row">
        </div>

        <div>
        <button type="submit" class="btn btn-outline-primary"> <i  class="fa fa-user-plus">Editar</i></button>
        <button type="reset" onclick="return confirm('Seguro de limpiar los campos?')" class="btn btn-outline-warning"><i class="fa fa-eraser">LIMPIAR</i></button>
        </div>


        </form>

</div>
</body>
</html>