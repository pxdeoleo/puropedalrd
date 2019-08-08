<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<section class="pag-section">
    <div class="container">
        <h1 class="">Anuncios</h1>

        <div class="row">
        <div class="col-sm-8">
        
<?php
    $anuncios = $this->anuncios_model->anuncios();

    date_default_timezone_set('America/Santo_Domingo');
    setlocale(LC_TIME, 'es_ES.UTF-8');

    foreach ($anuncios as $clave => $anuncio) {

      $caracteres = substr(strip_tags($anuncio['descripcion']),0,70);

      $fecha = $anuncio['fecha'];
      $fecharaw = strftime("%A, %d de %B del %Y", strtotime($fecha));

      $search = array('á','é','í','ó','ú');
      $replace = array('a','e','i','o','u');

      $fecha = str_replace($search, $replace, $fecharaw);

      $urlInfo = base_url("anuncios/descripcion/{$anuncio['id_anuncio']}");

        echo<<<ANUNCIO
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="fotos/anuncios/{$anuncio['foto']}">
                            <img class="img-rounded" src="fotos/anuncios/{$anuncio['foto']}" alt="">
                            </a>
                        </div>

                        <div class="col-sm-8">
                            <h5 class="card-title">{$anuncio['titulo']}</h5>
                            <p class="card-text">$caracteres</p>
                            <a class="" href="$urlInfo">Ver mas...</a>
                            <div class="row" id="small">
                                <div class="col-3 text-muted">
                                    <small><i class="fa fa-drivers-license-o"> user</i></small>
                                </div>
                                <div class="col-3 text-muted">
                                    <small><i class="fa fa-money"> {$anuncio['precio']}</i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <small>Publicado el $fecha</small>
                </div>
            </div>
            <hr>
ANUNCIO;
    }
?>    

        </div>
        </div>
    </div>
</section>
</body>
<style>
    .row img{
        width:200px;
        height:150px;
        object-fit:cover;
        overflow:hidden;
    }

    #small{
        font-size:20px;
    }
</style>
</html>