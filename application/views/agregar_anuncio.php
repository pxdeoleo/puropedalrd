<?php
session_start();	//Session
//---------------------------
plantilla::aplicar();
if (isset($_POST['titulo']) && isset($_FILES['foto'])) {
	$this->anuncios_model->guardarAnuncio($_POST, $_FILES['foto']);
}
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
	<br><br><br>
	<br><br><br>
	<form method='post' enctype="multipart/form-data">

		<div class="row">
			<div class="container col-8">
				<h2>Redactar Anuncio</h2>
				<br>
				<div class="form-group">
					<div class='input-group'>
						<?=asgInput('titulo', 'Titulo', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('marca', 'Marca', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('modelo', 'Modelo', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('accion', 'Accion', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('precio', 'Precio', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('provincia', 'Provincia', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('telefono', 'Teléfono/Celular', ['required'=>'required'])?>
					</div>
					<br>
					<div class='input-group'>
						<?=asgInput('descripcion', 'Descripcion', ['required'=>'required'])?>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-prepend">
								<span class="input-group-text">Imagen</span>
							</div>
							<div class="custom-file">
								<input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
								<label class="custom-file-label" for="inputGroupFile01">*.jpeg;*.jpg;*.gif;*.png</label>
							</div>
						</div>  
					</div>
					<label for="full-featured">Contenido</label>
					<textarea name='contenido' style="height:200px" id="full-featured"></textarea>

					<br>

					<button type="submit" class="btn btn-primary float-right">Subir Anuncio</button>

				</div>	
			</div>
		</div>
	</form>
</body>

<style>
  .carousel-inner img {
      width: 100%;
      max-height: 460px;
  }

  .carousel-inner{
  
  }
</style>
<script>
    
	tinymce.init({
	  selector: 'textarea#full-featured',
	  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter permanentpen pageembed tinycomments mentions linkchecker',
	  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
	  image_advtab: true,
	  content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tiny.cloud/css/codepen.min.css'
	  ],
	  link_list: [
		{ title: 'My page 1', value: 'http://www.tinymce.com' },
		{ title: 'My page 2', value: 'http://www.moxiecode.com' }
	  ],
	  image_list: [
		{ title: 'My page 1', value: 'http://www.tinymce.com' },
		{ title: 'My page 2', value: 'http://www.moxiecode.com' }
	  ],
	  image_class_list: [
		{ title: 'None', value: '' },
		{ title: 'Some class', value: 'class-name' }
	  ],
	  importcss_append: true,
	  height: 400,
	  file_picker_callback: function (callback, value, meta) {
		/* Provide file and text for the link dialog */
		if (meta.filetype === 'file') {
		  callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
		}
	
		/* Provide image and alt text for the image dialog */
		if (meta.filetype === 'image') {
		  callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
		}
	
		/* Provide alternative source and posted for the media dialog */
		if (meta.filetype === 'media') {
		  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
		}
	  },
	  templates: [
		{ title: 'Some title 1', description: 'Some desc 1', content: 'My content' },
		{ title: 'Some title 2', description: 'Some desc 2', content: '<div class="mceTmpl"><span class="cdate">cdate</span><span class="mdate">mdate</span>My content2</div>' }
	  ],
	  template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
	  template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
	  image_caption: true,
	  spellchecker_dialog: true,
	  spellchecker_whitelist: ['Ephox', 'Moxiecode'],
	  tinycomments_mode: 'embedded',
	  mentions_fetch: mentionsFetchFunction,
	  content_style: '.mce-annotation { background: #fff0b7; } .tc-active-annotation {background: #ffe168; color: black; }'
	 });
	
	
	</script>
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