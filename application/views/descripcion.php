<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();

$anuncio = new stdClass;
$id = $this->uri->segment(3);


if(isset($id)){
    $rs = $this->anuncios_model->anuncios_x_id($id);
    if (count($rs) > 0) {
        $anuncio = $rs[0];
    }
}
date_default_timezone_set('America/Santo_Domingo');
setlocale(LC_TIME, 'es_ES.UTF-8');

$fecha = $anuncio['fecha'];
$fecha = strftime("%A, %d de %B del %Y", strtotime($fecha));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row" id="row">
            <div class="col-2">

            </div>

            <div class="col-8">
                <div class="card">
                <div class="card-header">
                    <span class="text-muted">User</span>
                </div>
                    <div class="card-body">
                        <h2><?=$anuncio['titulo'] ?></h2>
                        <div class="row">
                            <div class="col-6">
                                <img class="img-fluid rounded my-3" src="../../fotos/anuncios/<?=$anuncio['foto']?>" alt="">
                            </div>
                            <div class="col-6">
                                <p> <b> Provincia:</b> <?=$anuncio['provincia']?> <br>
                                    <b> Telefono: </b> <?=$anuncio['telefono']?> <br>
                                    <b> Marca:    </b> <?=$anuncio['marca']?> <br>
                                    <b> Modelo:   </b> <?=$anuncio['modelo']?> <br>
                                    <b> Accion:   </b> <?=$anuncio['accion']?> <br>
                                    <b> Fecha:    </b> <?=$fecha?> <br>
                                    <b> Precio:  $</b> <?=$anuncio['precio']?> <br>
                            
                                </p>
                            </div>
                        </div>
                        <h4 class="my-3">Descripcion:</h4>
                        <p><?=$anuncio['descripcion']?></p>
                    </div>
                </div>
            </div>

            <div class="col-2">

            </div>
        </div>
    </div>
</body>
<style>
    .row img{
        width:400px;
        height:200px;
        object-fit:cover;
        overflow:hidden;
    }
    #row{
        margin-top:125px;
    }
</style>
</html>