<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();

if(isset($_FILES['slide'])){
    $slides = array(
        'texto'=>$_POST['textoSlide'],
        'slides'=>$_FILES['slide']
    );
    $this->slider_model->guardarSlides($slides);
}
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
<br>
<br>
<br>    
<br>
<br>
    <div class="container">
        <form enctype="multipart/form-data" method='post'>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class='row'>
                            <div class="form-group col-10">
                                <label for="inputSlide0">Slide 1</label>
                                <input required name='textoSlide[]' type="text" class="form-control" id="inputSlide0" placeholder="Texto del Slide">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="form-group col-10">
                                <div class="input-group">
                                    <div class="custom-file file-slide-0">
                                        <input required name='slide[]' type="file" class="custom-file-input" id="inputSlide0">
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
                    <div class='row'>
                        <div class="form-group col-10">
                            <label for="inputSlide`+sliders+`">Slide `+(sliders+1)+`</label>
                            <input name='textoSlide[]' required type="text" class="form-control" id="inputSlide`+sliders+`" placeholder="Texto del Slide">
                        </div>
                    </div>
                    <div class="slide`+sliders+` row">
                        <div class="form-group col-10">
                            <div class="input-group slide`+sliders+`">
                                <div class="custom-file file-slide-`+sliders+`">
                                    <input required name='slide[]' type="file" class="custom-file-input" id="inputSlide`+sliders+`">
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