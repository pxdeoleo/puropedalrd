<?php
plantilla::aplicar();
date_default_timezone_set('America/Santo_Domingo');
setlocale(LC_TIME, 'es_ES.UTF-8');
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
<!-- Page Content -->
<section class="page-section" id="services">
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Noticias
  <small></small>
</h1>

<?php
  $noticias = $this->noticias_model->noticias();
  
  



  foreach ($noticias as $clave => $noticia) {
      $caracteres = substr(strip_tags($noticia['contenido']),0,150);

      $fecha = $noticia['fecha'];
      $fecharaw = strftime("%A, %d de %B del %Y", strtotime($fecha));

      $search = array('á','é','í','ó','ú');
      $replace = array('a','e','i','o','u');

      $fecha = str_replace($search, $replace, $fecharaw);

      $urlInfo = base_url("noticias/articulo/{$noticia['id_noticia']}");
      echo<<<NOTICIA
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="noticias/articulo/{$noticia['id_noticia']}">
                        <img class="img-fluid rounded" src="fotos/noticias/{$noticia['foto']}" alt="{$noticia['asunto']}">
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <h2 class="card-title">{$noticia['asunto']}</h2>
                        <p class="card-text"> <b> $caracteres </b> </p>
                        <a class="" href="$urlInfo">Leer mas...</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
            <small>Publicado el {$fecha}</small>
            </div>
        </div>
<hr>
NOTICIA;
  }
?>


<!-- Pagination -->
<ul class="pagination justify-content-center">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      <span class="sr-only">Previous</span>
    </a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">1</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">2</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">3</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      <span class="sr-only">Next</span>
    </a>
  </li>
</ul>

</div>
</section>
<!-- /.container -->
    
</body>
<style>
    .row img{
        width:750px;
        height:200px;
        object-fit:cover;
        overflow:hidden;
    }
</style>
</html>