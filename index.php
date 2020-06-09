<!DOCTYPE html>
<html>
<head>
	<title>JQuery Calendar</title>
	
	<!-- CALENDAR CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudfare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
	<!-- END OF CALENDAR CDN -->
	
  
</head>
<body>
	<br />
	<h2 align="center"><a href="#">JQuery Full Calendar Integration with PHP and MySQL</a></h2>
	<br />
	<div class="container">
		<div id="calendar"></div>
	</div>
	
	<br /><br />
	
	<script>
	$(document).ready(function(){
		
		//var calendar = $("#calendar").fullCalendar();
		
		var calendar = $("#calendar").fullCalendar({
			editable:true,
			header:{
				left:'prev,next today',
				center:'title',
				right:'month,agendaWeek,agendaDay'
			},
			events:'load.php',
			selectable:true,
			selectHelper:true,
			select:function(start, end, allDay){
				var title = prompt("Enter event title");
				if(title){
					var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
					$.ajax({
						url:"insert.php",
						type:"POST",
						data:{title:title, start:start, end:end},
						success:function(){
							calendar.fullCalendar('refetchEvents');
							alert("Added Successfully");
						}
					})
				}
			},
			editable:true,
			eventResize:function(event){
				var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				var title = event.title;
				var id = event.id;
				$.ajax({
					url:"update.php",
					type:"POST",
					data:{title:title, start:start, end:end, id:id},
					success:function(){
						calendar.fullCalendar('refetchEvents');
						alert('Event Updated')
					}
				})
			},
			eventDrop:function(event){
				var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				var title = event.title;
				var id = event.id;
				$.ajax({
					url:"update.php",
					type:"POST",
					data:{title:title, start:start, end:end, id:id},
					success:function(){
						calendar.fullCalendar('refetchEvents');
						alert("Event Updated");
					}
				})
			},
			eventClick:function(event){
				if(confirm("Are you sure you want to remove event?")){
					var id = event.id;
					$.ajax({
						url:"delete.php",
						type:"POST",
						data:{id:id},
						success:function(){
							calendar.fullCalendar('refetchEvents');
							alert("Event removed");
						}
					})
				}
			},
			
		});
		
	});
	
	</script>
</body>
</html>