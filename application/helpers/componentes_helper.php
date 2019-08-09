<?php
    function asgInput($nombre, $label, $opts=[]){

        $placeholder='';
        $type = 'text';
        $required = '';
        $class = 'form-control';
        $id='';
        $disabled='';
        $value='';

        foreach($opts as $k=>$v){
            $$k = $v;
        }

        return <<<INPUT
        <div class="input-group-prepend">
            <span class="input-group-text">{$label}</span>
        </div>
        <input {$disabled} id='{$id}' placeholder='{$placeholder}' type="{$type}" name='{$nombre}' class='{$class}' {$required} value="{$value}">
INPUT;
    }

    function asgTextArea($nombre, $label, $opts=[]){

        $placeholder='';
        $type = 'text';
        $required = '';
        $class = 'form-control';

        foreach($opts as $k=>$v){
            $$k = $v;
        }

        return "<div class='form-group'>
        <label>{$label}: </label>
        <textarea class={$class} placeholder='{$placeholder}' {$required} type='{$type}' name='{$nombre}'></textarea>
        </div>";
    }

    function asgCheck($nombre, $label, $radios=[], $values=[], $inline='form-check-inline', $etiqueta=true){
        $required = '';
        $id='';
        $disabled='';
        $checked='';

        if($etiqueta){
            $regreso = <<<INPUT
        <label>{$label}:</label>
        <div class='form-check'>
INPUT;
        } else {
            $regreso = '<div class="form-check">';
        }

        $cont = 0;
        foreach($radios as $radio){
            $id = preg_replace("/[^a-zA-Z0-9]/", "", $values[$cont]);
            $regreso .= <<<RETORNO
            <div class="form-check {$inline}">
                <input class="form-check-input" id='r{$id}' type="checkbox" name="{$nombre}" value="{$values[$cont]}" {$checked}>
                <label class="form-check-label" for="r{$id}">
                    {$radio}
                </label>
            </div>
RETORNO;
            $cont++;
        }

        $regreso .= '</div>';

        return $regreso;

    }



    function asgRadio($nombre, $label, $radios=[], $values=[], $inline='form-check-inline', $etiqueta=true, $type='radio'){
        $required = '';
        $id='';
        $disabled='';
        $checked='';


        if($etiqueta){
            $regreso = <<<INPUT
        <label>{$label}:</label>
        <div class='form-check'>
INPUT;
        } else {
            $regreso = '<div class="form-check">';
        }

        $sel = 0;
        $cont = 0;
        foreach($radios as $radio){
            if($type=='radio'){
                if ($sel==0) {
                    $checked = 'checked';
                    $sel = $sel+1;
                }else{
                    $checked='';
                }
            }
            $regreso .= <<<RETORNO
            <div class="form-check {$inline}">
                <input class="form-check-input" id='r{$nombre}{$values[$cont]}' type="{$type}" name="{$nombre}" value="{$values[$cont]}" {$checked}>
                <label class="form-check-label" for="r{$nombre}{$values[$cont]}">
                    {$radio}
                </label>
            </div>
RETORNO;
            $cont++;
        }

        $regreso .= '</div>';

        return $regreso;

    }

    function insArticulo($imagen, $titulo, $descripcion){
        return<<<CARD
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div> 
CARD;
    }

    function guardarFoto($foto, $num, $carpeta){
        $ruta="fotos/".$carpeta."/";//ruta carpeta donde queremos copiar las imágenes
        $uploadfile_temporal=$foto['tmp_name'];
            

        if($foto["type"]=="image/jpeg")
        {
            $uploadfile_nombre = ($num).'.jpg';

        }
        else if($foto["type"]=="image/pjpeg")
        {
            $uploadfile_nombre = ($num).'.jpeg';       
       
        }
        else if($foto["type"]=="image/gif")
        {
            $uploadfile_nombre = ($num).'.gif';       

        }
        else if($foto["type"]=="image/png"){
            $uploadfile_nombre = ($num).'.png';       
        }

        move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);

        return $uploadfile_nombre;
    }

?>