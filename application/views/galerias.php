<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();
$base = base_url('base');
$ver_galerias = base_url('fotos/galerias/ver/');
$rutafotos = base_url('fotos');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="<?=$base;?>/css/galeria.general.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
      <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="../puropedal">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galerías</li>
            </ol>
        </nav>
        <h1>Galerías</h1>
        <!-- Galerias -->
        <div class="wrap">
        <?php
            $galerias = $this->galeria_model->getGalerias();
            for ($i=0; $i < count($galerias); $i++) { 
                # code...   
                echo<<<GALERIA
                    <div class="tile"> 
                        <a href="galerias/ver/{$galerias[$i]['id_galeria']}">
                            <img src='{$rutafotos}/galerias/{$galerias[$i]['foto']}'/>
                            <div class="text">
                                <h1>{$galerias[$i]['id_galeria']}</h1>
                                <h2 class="animate-text">{$galerias[$i]['nombre']}</h2>
                                <p class="animate-text">{$galerias[$i]['descripcion']}</p>
                            </div>
                        </a>
                    </div>
GALERIA;
            }
        ?>
        </div>
    <!-- !Galerias -->
    </div>
    
</body>
</html>