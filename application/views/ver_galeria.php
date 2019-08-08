<?php
plantilla::aplicar();
$base = base_url('base');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="<?=$base;?>/css/galeria.general.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 
    <link href="<?=$base;?>/css/galeria.ver.css" rel="stylesheet" type="text/css">
    <script src="<?=$base;?>/js/galeria.ver.js"></script>


</head>
<body>
    <br>
    <br>

    <!-- Fotos -->
    <?php

    ?>

   <div class="container page-top">
   <?php
        $galeria = $this->galeria_model->getFotos($id_galeria);
   ?>
   <h2><?=$galeria['nombre']?></h2>

        <div class="row">
            <?php

                for ($i=0; $i < count($galeria['fotos']); $i++) { 
                    # code...
                    echo<<<FOTO
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="../../fotos/galerias/{$galeria['fotos'][$i]['foto']}" class="fancybox" rel="ligthbox">
                            <img  src="../../fotos/galerias/{$galeria['fotos'][$i]['foto']}" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
FOTO;
                }
            ?>
        </div>
    </div>
    <!-- !Fotos -->
    
</body>
</html>