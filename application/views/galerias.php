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

</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
      <div class="container">
        <h1>Galerías</h1>
        <!-- Galerias -->
        <?php
            $galerias = $this->galeria_model->getGalerias();
            for ($i=0; $i < count($galerias); $i++) { 
                # code...   
                echo<<<GALERIA
                <div class="wrap">
                    <div class="tile"> 
                        <a href="galerias/ver/{$galerias[$i]['id_galeria']}"><img src='fotos/galerias/{$galerias[$i]['foto']}'/>
                            <div class="text">
                                <h1>{$galerias[$i]['id_galeria']}</h1>
                                <h2 class="animate-text">{$galerias[$i]['nombre']}</h2>
                                <p class="animate-text">{$galerias[$i]['descripcion']}</p>
                            </div>
                        </a>
                    </div>
                </div>
GALERIA;
            }
        ?>
    <!-- !Galerias -->
    </div>
    
</body>
</html>