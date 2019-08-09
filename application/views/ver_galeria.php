<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();
$ruta = base_url();
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
        $galeria = $this->galeria_model->getFotos($id_galeria);
   ?>

   <div class="container page-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-dark">
                <li class="breadcrumb-item"><a href="<?=$ruta?>">Home</a></li>
                <li class="breadcrumb-item"><a href="../../galerias">Galerías</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$galeria['nombre']?></li>
            </ol>
        </nav>
   
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
        <div id="disqus_thread"></div>
        <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        var disqus_url = 'http://www.puropedalrd.com';
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://puropedalrd.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    <!-- !Fotos -->
    
<script id="dsq-count-scr" src="//puropedalrd.disqus.com/count.js" async></script>
</body>
</html>