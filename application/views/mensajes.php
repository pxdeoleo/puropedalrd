<?php
plantilla::aplicar();
$contactos = $this->mensajes_model->ver_todos();
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
<br><br>
<br><br>
<br><br>
    <div class='col-3'>
    </div>
    <div class="container col-7">
        <?php
        
            # code...
            foreach ($contactos as $clave => $contacto) {
                # code...
                echo<<<CONTACTO
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2 class="card-title">{$contacto['nombre']}</h2>
                            <p class="card-text"> <b> Correo </b>{$contacto['correo']} </p>
                            <p class="card-text"> <b> Telefono </b> {$contacto['telefono']}</p>
                            <p class="card-text"> <b> Comentario </b> {$contacto['comentario']}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                <small>{$contacto['fecha']}</small>
                </div>
            </div>

CONTACTO;
            }
        ?>
    </div>
</body>
</html>