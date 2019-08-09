<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
   
    <title>Document</title>
</head>
<body>
    
     <!-- Tabla de artículos -->
     <table  class="table table-hover">
                  <thead>
                    <th>Nombre</th>
                    <th>Foto Logo</th>
                    <th>Foto</th>
                    <th>Ubicacion</th>
                    <th>Descripcion</th>
                  </thead>
                  <tbody id="tabla">
                    <?php
                      $rs = Grupo_model::listado_grupos();

                      foreach ($rs as $grupo) {
                        $urlEditar = base_url("index.php/grupo/editar_grupo/{$grupo->id_grupo}");
                        $urlBorrar = base_url("index.php/grupo/borrar_grupo/{$grupo->id_grupo}"); 
                      
                        echo <<<TABLA
                        <tr>
                          
                          <td>{$grupo->nombre}</td>
                          <td>{$grupo->id_foto_logo}</td>
                          <td>{$grupo->id_foto}</td>
                          <td>{$grupo->ubicacion}</td> 
                          <td>{$grupo->descripcion}</td>
                         <td><a href='$urlEditar' class='btn btn-warning'><i class='fa fa-edit'></a></td>
                         <td><a href='$urlBorrar' onclick=\"return confirm('Estas seguro de eliminarlo?')\" class='btn btn-danger'>X</a></td>
     
                        </tr>
TABLA;
                      }
                    ?>
                  </tbody>
              </table>





</body>
</html>