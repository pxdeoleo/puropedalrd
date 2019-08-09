<?php
session_start();	//Session
//---------------------------
// plantilla::aplicar();

if (isset($_POST)) {
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('base/css/sidebar.css')?>">

</head>
<body>
<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		<br><br><br>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="<?=base_url('admin/sliders')?>">
                   Slider
                  </a>
                </li>
                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="#"> Noticias <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="<?=base_url('admin/noticias')?>">Nueva noticia</a></li>
                    <li><a href="<?=base_url('admin/lista_noticias')?>">Ver/Editar Noticias</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#">Galería <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="<?=base_url('admin/agregar_galeria')?>">Nueva</a></li>
                  <li><a href="<?=base_url('admin/gestionar_galerias')?>">Gestionar</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"> Eventos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li><a href="<?=base_url('admin/agregar_evento')?>">Agregar</a></li>
                  <li><a href="<?=base_url('admin/editar_evento')?>">Modificar</a></li>
                </ul>


                 <li>
                  <a href="#">
                   Grupos
                  </a>
                  </li>

                 <li>
                  <a href="<?=base_url('admin/mensajes')?>">
                   Mensajes
                  </a>
                </li>
            </ul>
    	 </div>
	</div>








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