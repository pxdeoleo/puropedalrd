<?php
// session_start();	//Session
//---------------------------
plantilla::aplicar();
if (isset($_POST['asunto']) && isset($_FILES['foto'])) {
	# code...
	
}


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
	
</head>
<body>
	<br><br><br>
	<br><br><br>
	<form method='post' enctype="multipart/form-data">
		<input type="hidden" name="foto_orig" value='<?=$foto?>'>

		<div class="row">
			<div class="col-2">
			</div>
			<div class="container col-8">
				<h2>Nuevo Evento</h2>
				<br>
				<div class="form-group">
					<div class="form-row">
						<div class='input-group'>
							<?=asgInput('nombre', 'Nombre del Evento')?>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="form-row">
						<div class='input-group'>
							<?=asgInput('descripcion', 'Descripción')?>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="form-row">
						<div class='input-group'>
							<?=asgInput('enlace', 'Enlace de Inscripción')?>
							<?=asgInput('ruta_strava', 'Enlace de Strava')?>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="form-row">
						<div class='input-group'>
							<?=asgInput('descripcion', 'Descripción')?>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="form-row">
						<div class='input-group col-3'>
							<?=asgInput('fecha', 'Fecha', ['type'=>'date'])?>
						</div>
						<div class='input-group col-9'>
							<?=asgInput('grupo_organiza', 'Grupo que lo Organiza')?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class='input-group'>
							<?=asgInput('lugar', 'Lugar')?>
						</div>
					</div>
				</div>		
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Imagen</span>
					</div>
					<div class="custom-file">
						<input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
						<label class="custom-file-label" for="inputGroupFile01">Subir archivo</label>
					</div>
				</div>

				<br>
				<button type="submit" class="btn btn-primary float-right">Subir</button>

			</div>

		</div>
	</form>
</body>

<style>
  .carousel-inner img {
      width: 100%;
      max-height: 460px;
  }

  .carousel-inner{
  
  }
</style>

</html>