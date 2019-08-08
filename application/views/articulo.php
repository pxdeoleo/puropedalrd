<?php
plantilla::aplicar();
$noticia = new stdClass;
$id = $this->uri->segment(3);


if(isset($id)){
    $rs = $this->noticias_model->noticias_x_id($id);
    if (count($rs) > 0) {
        $noticia = $rs[0];
    }
}
date_default_timezone_set('America/Santo_Domingo');
setlocale(LC_TIME, 'es_ES.UTF-8');

$fecha = $noticia['fecha'];
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
        <div class="row">
            <div class="card col-8">
                <div class='card-body'>
                    <input type="hidden" name="id_noticia" value='<?= $noticia['id_noticia']?>'>
                    <h2><?=$noticia['asunto']?></h2>
                            
                    <hr>
                    <img class="img-fluid rounded noti-full" src="../../fotos/noticias/<?=$noticia['foto']?>" alt="">

                    <hr>
                    <Small class=text-muted><?=$fecha?></small>
                    <br>
                    <br>
                            
                    <p><?=$noticia['contenido']?></p>
                </div>
            </div>
            <div class="col-4 ml-auto">
				<a href="eventos"><h4>Artículos Recientes</h4></a>
				<hr>
				<!-- Artículos Recientes -->
				<?php
					date_default_timezone_set('America/Santo_Domingo');
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    
					$noticias = $this->noticias_model->ultNoticias();
					foreach ($noticias as $clave => $noti) {
						$descripcion = $contenido = substr($noti['contenido'], 0, 25);
						$fecha = strftime("%d/%B/%Y", strtotime($noti['fecha']));
                        $rutanoticia = base_url('noticias/articulo/').$noti['id_noticia'];
                        $rutafotonoticia = base_url('fotos/noticias/').$noti['foto'];
						# code...
						echo<<<EVENTO
						<div class="card">
							<div class="card-body">
								<img class="card-img-top" src="{$rutafotonoticia}" alt="Card image cap">
								<h5 class="card-title">{$noti['asunto']}</h5>
								<a href='{$rutanoticia}'class="btn btn-sm btn-primary">Detalles</a>
								{$fecha}
							</div>
						</div>
						<br>
EVENTO;
					}	
				?>
				
			</div>
        </div>
    </div>
</body>
<style>
    .noti-full{
        width:900px;
        height:300px;
        object-fit:cover;
        overflow:hidden;
    }
    .row{
        margin-top:125px;
    }
    
    
</style>
</html>