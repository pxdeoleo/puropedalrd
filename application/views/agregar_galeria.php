<?php
//---------------------------
plantilla::aplicar();

if(isset($_FILES['galeria'])){
    $galeria = array(
        'descripcion'=>$_POST['descripcion'],
        'nombre'=>$_POST['nombre'],
        'fotos'=>$_FILES['galeria']
    );
    $this->galeria_model->guardar_galeria($galeria);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<br>
<br>
<br>    
<br>
<br>
    <div class='row'>
        <div class="col-2">
        </div>
        <div class="container col-8">
            <form enctype="multipart/form-data" method='post'>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class='row'>
                                <div class="form-group col-4">
                                    <label for="inputSlide0">Nombre</label>
                                    <input required name='nombre' type="text" class="form-control" id="inputSlide0" placeholder="Nombre">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputSlide0">Descripcion</label>
                                    <input required name='descripcion' type="text" class="form-control" id="inputSlide0" placeholder="Descripción de la Galería">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="form-group col-10">
                                    <div class="input-group">
                                        <div class="custom-file file-slide-0">
                                            <input required name='galeria[]' type="file" class="custom-file-input" id="inputSlide0">
                                            <label id='labelInputSlide0'class="custom-file-label" for="inputSlide0">*.jpeg;*.jpg;*.png;*.gif</label>
                                        </div>
                                    </div>
                                    <!-- <div id='subir1'></div> -->
                                </div>
                                <div class="form-group col-2">
                                    <button id='addSlide' type="button" class="btn btn-outline-primary">Agregar</button>  
                                </div>
                            </div>
                        </li>
                        <div id='subir1'></div>
                    </ul>
                    <br>
                    <button type="submit" class="btn btn-primary float-right">Subir</button>
            </form>
        </div>    
</div>
</div>
</div>
</body>
</html>

<script>

    var sliders = 1;

    // console.log("----Inicio-----");
    // console.log("cont -> " + cont);
    // console.log("div -> " + div);
    // console.log("newdiv -> " + newdiv);
    // console.log("---------------");
    
    $("#addSlide").click(function() {
        if(sliders<=6){
            var html = `
                <li class="list-group-item">
                    <div class="slide`+sliders+` row">
                        <div class="form-group col-10">
                            <div class="input-group slide`+sliders+`">
                                <div class="custom-file file-slide-`+sliders+`">
                                    <input required name='galeria[]' type="file" class="custom-file-input" id="inputSlide`+sliders+`">
                                    <label id="labelInputSlide`+sliders+`" class="custom-file-label" for="inputSlide`+sliders+`">*.jpeg;*.jpg;*.png;*.gif</label>
                                </div>
                            </div>
                        </div>
                        <div id='botonBorrar`+sliders+`' class="form-group col-2">
                            <button id='delSlide`+sliders+`' type='button' class='btn btn-outline-danger btnDelSlide'>Borrar</button>
                        </div>
                    </div>
                </li>
                <div id='subir`+(sliders+1)+`' class='input-group'></div>
            `;
            
            $(document.getElementById("subir"+sliders)).replaceWith(html);

            if(sliders>1){
                $("#delSlide"+(sliders-1)).remove();
            }
            sliders++;
            console.log("sliders->"+sliders);

        }

    });

    $(document).on("click", ".btnDelSlide", function() {

        var clase = $(this).parent().parent().parent().attr('class');
        console.log(clase);

        $(this).parent().parent().parent().remove();
        // $('#subir'+sliders).remove();
        $(document.getElementById("subir"+sliders)).replaceWith('<div id="subir'+(sliders-1)+'"></div>');

        sliders--;
        $('#botonBorrar'+(sliders-1)).html("<button id='delSlide"+(sliders-1)+"' type='button' class='btn btn-outline-danger btnDelSlide'>Borrar</button>");
    });

    $(document).on("change", "input[type='file']", function(e){
        var fileName = e.target.files[0].name;
        $(this).siblings().text(fileName);
    });

    // $('input[type="file"]').change(function(e){
        
    

    
</script>