<?php
session_start();	//Session
//---------------------------
    plantilla::aplicar();
    date_default_timezone_set('America/Santo_Domingo');
    setlocale(LC_TIME, 'es_ES.UTF-8');
    require "vendor/autoload.php";

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css"/>
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

</head>
<body>
    <br><br><br><br><br>
    <div class="container">
        <form>  
            <?php
                $fecha_parse = date_parse($evento[0]['fecha']);
                $fecha_now = date_parse(date("Y-m-d"));
                if($fecha_parse<$fecha_now){
                    echo<<<VENCIO
                    <div class="alert alert-danger" role="alert">
                        Este evento ya venció
                    </div>
VENCIO;
                }
            ?>
            <div class="row">
                <?php $nombre = $evento[0]['nombre'];?>
                <div class="card col-9">
                    <div class='card-body'>
                        <div class='foto-evt'><img src="<?=base_url('fotos/eventos/'.$evento[0]['foto'])?>" alt=""></div>
                        <h2><?=$evento[0]['nombre']?></h2>
                        <b>Grupo que lo organiza:</b><p><?=$evento[0]['grupo_organiza']?></p>
                        <b>Descripcion:</b><p><?=$evento[0]['descripcion']?></p>
                        <b>Ruta en Strava:</b><p><a href="<?=$evento[0]['ruta_strava']?>"><?=$evento[0]['ruta_strava']?></a></p>
                        <b>Fecha:</b><p><?=$evento[0]['fecha']?></p>
                        <b>Lugar:</b><p><?=$evento[0]['lugar']?></p>
                        <b>Inscripción:</b><p><a href="<?=$evento[0]['ruta_strava']?>"><?=$evento[0]['ruta_strava']?></a></p>  
                        <div id="map" style="width: 800px; height: 500px"></div>
                    <?php
                    $geocoder = new \OpenCage\Geocoder\Geocoder('17b79fdb1b0a4b2e9a9663916672b14a');

                    $result = $geocoder->geocode($evento[0]['lugar'], ['language' => 'es']);
                    $first = $result['results'][0];
                    $lng = $first['geometry']['lng']; 
                    $lat = $first['geometry']['lat'];
                    ?>
                    </div>

                </div>
                <style>
                .foto-evt{
                    width:100%;
                    object-fit: cover;
                    overflow: hidden;
                }
                
                </style>
                <div class='col-3 ml-auto'>
                    <!-- Próximos eventos -->
                    <?php
                        $rutaFEventos = base_url('fotos/eventos/');
                        date_default_timezone_set('America/Santo_Domingo');
                        setlocale(LC_TIME, 'es_ES.UTF-8');
                        $eventos = $this->eventos_model->ultEventos();
                        foreach ($eventos as $clave => $evento) {
                            $descripcion = $contenido = substr($evento['descripcion'], 0, 25);
                            $fecha = strftime("%d/%B/%Y", strtotime($evento['fecha']));
                            $rutafoto = $rutaFEventos.$evento['foto'];
                            $rutaevento = base_url('eventos/ver/').$evento['id_evento'];
                            # code...
                            echo<<<EVENTO
                            <div class="card">
                                <div class="card-body">
                                    <img class="card-img-top" src="{$rutafoto}" alt="Card image cap">
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
        </form>
    </div>
    <?php
    echo<<<ECO
ECO;
    ?>
    <script>
        var map = L.map('map').setView([<?= $lat ?>, <?=$lng?>], 8);
        mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);

		L.marker([<?= $lat ?>, <?=$lng?>]).addTo(map);
    </script>

</body>

</html>