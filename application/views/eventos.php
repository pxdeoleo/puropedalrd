<?php
session_start();	//Session
//---------------------------

    plantilla::aplicar();

    
    foreach ($eventos as $evento) {
        echo '<input type="hidden" value="'.$evento->fecha.'" class="form-control" name="fecha[]" required>
        <input type="hidden" value="'.$evento->id_evento.'" class="form-control" name="id_evento[]" required>
        <input type="hidden" value="'.$evento->nombre.'" class="form-control" name="nombre[]" required>';
    }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="<?=base_url('base/css/')?>cssCalendar.css">
<script src="<?=base_url('base/js/')?>calendar.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script>

	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var eventos = [],
        id = document.getElementsByName('id_evento[]');
        fecha = document.getElementsByName('fecha[]');
        nombre = document.getElementsByName('nombre[]');

        for (var i = 0; i < nombre.length; i++) {
        fech = fecha[i].value;
        idA = id[i].value;
        titulo = nombre[i].value;
        dia = fech.substr(8,2);
        mes = fech.substr(5,2);
        ano = fech.substr(0,4);
        eventos.push({
          title: titulo,
          start: new Date(ano, mes-1, dia),
          end: new Date(ano, mes-1, dia),
          allDay: true,
          url: '<?= base_url('eventos/ver/') ?>' + idA });
      }

		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy',// September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'   // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			events: eventos			
		});
		
	});

</script>
<style>

	body {
	    margin-bottom: 40px;
		text-align: center;
		font-size: 14px;
		font-family: 'Roboto', sans-serif;
		background:url(<?=base_url('fotos/fondo.jpg')?>);
		}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		-webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
-moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
		}

</style>
</head>
<body>
<div id='wrap'>

<div id='calendar'></div>

<div style='clear:both'></div>
</div>
</body>
</html>
