<?php
plantilla::aplicar();
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
    <title>Document</title>
</head>
<body>
    <!-- SLIDER -->
<header class="masthead">
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
	<?php
		$slides = $this->slider_model->getSlides();
		$tmp = 0;
		foreach ($slides as $clave => $slide) {
			# code...

			if($tmp==0){
				$active = 'class="active"';
			}else{
				$active = "";
			}
			echo<<<DATA_SLIDE_TO
			<li data-target="#carousel-example-2" data-slide-to="{$tmp}" {$active}></li>		
DATA_SLIDE_TO;
			$tmp++;
		}
	?>
  </ol>
  <!--/.Indicators-->

	<?php


	?>
  <!--Slides-->
  <div class="carousel-inner" role="listbox">

	<?php
	$tmp = true;
	foreach ($slides as $clave => $slide) {
		# code...
		if($tmp){
			$active = 'active';
			$tmp = false;
		}else{
			$active = '';
		}
		echo<<<SLIDE
		<div class="carousel-item {$active}" >
			<div class="view">
				<img class="d-block w-100" src="fotos/slider/{$slide['foto']}"
				alt="{$slide['texto']}">
				<div class="mask rgba-black-light"></div>
			</div>
			<div class="carousel-caption">
				<h3 class="h3-responsive">{$slide['texto']}</h3>
			</div>
		</div>
SLIDE;
	}
	?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
</header>
<br>
<br>

<?php
  $noticias = $this->noticias_model->ultNoticias();
?>
	<div class='container'>
		<div class="row">
			<div class='col-9'>
				<!-- Noticias recientes -->
				<div class='card-group'>
					<?php
						foreach ($noticias as $clave => $noticia) {
						# code...
						$contenido = substr(strip_tags($noticia['contenido']), 0, 150);
						echo<<<NOTICIA
						<div class="card">
							<a href="noticias/{$noticia['id_noticia']}">
							<img class="card-img-top noti-thumb" src="fotos/noticias/{$noticia['foto']}" height='160' alt="{$noticia['asunto']}">
							</a>
							<div class="card-body">
							<h5 class="card-title">{$noticia['asunto']}</h5>
							<p class="card-text">{$contenido}...<a href="#"> Leer más...</a></p>
							</div>
							<div class="card-footer">
							<small class="text-muted">{$noticia['fecha']}</small>
							</div>
						</div>

NOTICIA;
				}
					?>
				</div>
			</div>
			<div class="col-3 ml-auto">
				<!-- Próximos eventos -->
				<?php
					$eventos = $this->eventos_model->ultEventos();
					foreach ($eventos as $clave => $evento) {
						# code...
						var_dump($evento);
					}	
				?>
				  
			</div>
		</div>
	</div>

    
</body>

<style>

	.d-block {
		width:100%;
		height:100%;
		object-fit: cover;
		overflow: hidden;
	}
	.noti-thumb {
		width:600;
		height:400;
		object-fit: cover;
		overflow: hidden;
	}

  .carousel-inner img {
      width: 100%;
      max-height: 460px;
  }

</style>
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
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
					className: 'success'
				}
			],			
		});
		
		
	});

</script>
</html>