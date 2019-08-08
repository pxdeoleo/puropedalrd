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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?=$base;?>/js/fotos.inicio.js"></script>
	<link href="<?=$base;?>/css/fotos.inicio.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- SLIDER -->
<div class="container">
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
	<?php
		$slides = $this->slider_model->getSlides();
		$tmp = 0;
		foreach ($slides as $clave => $slide) {
			# code...

			if($tmp==0){
				$active = 'class="active"';
			}else{
				$active = "";
			}
			echo<<<DATA_SLIDE_TO
			<li data-target="#carousel-example-2" data-slide-to="{$tmp}" {$active}></li>		
DATA_SLIDE_TO;
			$tmp++;
		}
	?>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

	<?php
	$tmp = true;
	foreach ($slides as $clave => $slide) {
		# code...
		if($tmp){
			$active = 'active';
			$tmp = false;
		}else{
			$active = '';
		}
		echo<<<SLIDE
		<div class="carousel-item {$active}" >
			<div class="view">
				<img class="d-block w-100" src="fotos/slider/{$slide['foto']}"
				alt="{$slide['texto']}">
				<div class="mask rgba-black-light"></div>
			</div>
			<div class="carousel-caption">
				<h3 class="h3-responsive">{$slide['texto']}</h3>
			</div>
		</div>
SLIDE;
	}
	?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
</div>

<!-- Galeria -->
<div class="container">
	<div class="row justify-content-md-center">
		<?php
			$fotos = $this->galeria_model->fotos_visitas();
			for ($i=0; $i < 3; $i++) { 
				# code...
				$descripcion = substr($fotos[$i]['descripcion'], 0, 100);
				echo<<<FOTO
				<figure class="snip1543">
					<img src="fotos/galerias/{$fotos[$i]['foto']}" alt="{$fotos[$i]['nombre']}" />
					<figcaption>
						<h3>{$fotos[$i]['nombre']}</h3>
						<p>{$descripcion}...</p>
					</figcaption>
					<a href="galerias/ver/{$fotos[$i]['id_galeria']}"></a>
				</figure>
FOTO;
			}
		?>
	</div>
</div>
<!-- Galeria -->
<br>

<?php
  	$noticias = $this->noticias_model->ultNoticias();
?>

	<div class='container'>
		<div class="row">
			<div class='col-9'>
				<a href="noticias"><h4>Noticias Recientes</h4></a>
				<hr>
				<!-- Noticias recientes -->
				<div class='card-group'>
					<?php
						foreach ($noticias as $clave => $noticia) {
						# code...
						$contenido = substr(strip_tags($noticia['contenido']), 0, 150);
						echo<<<NOTICIA
						<div class="card">
							<a href="noticias/articulo/{$noticia['id_noticia']}">
								<img class="card-img-top noti-thumb" src="fotos/noticias/{$noticia['foto']}" height='160' alt="{$noticia['asunto']}">
							</a>
							<div class="card-body">
							<h5 class="card-title">{$noticia['asunto']}</h5>
							<p class="card-text">{$contenido}...<a href="noticias/articulo/{$noticia['id_noticia']}"> Leer más...</a></p>
							</div>
							<div class="card-footer">
							<small class="text-muted">{$noticia['fecha']}</small>
							</div>
						</div>

NOTICIA;
				}
					?>
				</div>
			</div>
			<div class="col-3 ml-auto">
				<a href="eventos"><h4>Próximos Eventos</h4></a>
				<hr>
				<!-- Próximos eventos -->
				<?php
					date_default_timezone_set('America/Santo_Domingo');
					setlocale(LC_TIME, 'es_ES.UTF-8');
					$eventos = $this->eventos_model->ultEventos();
					foreach ($eventos as $clave => $evento) {
						$descripcion = $contenido = substr($evento['descripcion'], 0, 25);
						$fecha = strftime("%d/%B/%Y", strtotime($evento['fecha']));
						$rutaevento = base_url('eventos/ver/').$evento['id_evento'];
						# code...
						echo<<<EVENTO
						<div class="card">
							<div class="card-body">
								<img class="card-img-top" src="fotos/eventos/{$evento['foto']}" alt="Card image cap">
								<h5 class="card-title">{$evento['nombre']}</h5>
								<a href='{$rutaevento}'class="btn btn-sm btn-primary">Detalles</a>
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
	.d-block {
		width:100%;
		height:100%;
		object-fit: cover;
		overflow: hidden;
	}
	.noti-thumb {
		width:600;
		height:400;
		object-fit: cover;
		overflow: hidden;
	}

	.carousel-item {
		height: 65vh;
		min-height: 350px;
		background: no-repeat center center scroll;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
/*
  .carousel-inner img {
      width: 640px;
      max-height: 400px;
	  margin: auto;
  }*/


  .carousel {
	  margin-top: 103px;
  }
</style>
<script>					
	$("[data-toggle=popover]")
	.popover({ html: true})
	.on("focus", function () {
		$(this).popover("show");
	}).on("focusout", function () {
		var _this = this;
		if (!$(".popover:hover").length) {
			$(this).popover("hide");
		}
		else {
			$('.popover').mouseleave(function() {
				$(_this).popover("hide");
				$(this).off('mouseleave');
			});
		}
	});
</script>
</html>