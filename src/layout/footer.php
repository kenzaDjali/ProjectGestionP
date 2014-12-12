       
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="assets/jquery/dist/jquery.min.js"></script> 
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/excanvas.min.js"></script> 
        <script src="js/chart.min.js" type="text/javascript"></script> 

        <script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
         
        <script src="js/base.js"></script>
        
        <!-- DataTables -->
        <script type="text/javascript"  src="assets/DataTables-1.10.3/media/js/jquery.dataTables.js"></script>
        
    
        
        <!-- for teacher -->
        <!-- Tooltip Boostrap -->
        <script language="javascript" type="text/javascript" src="assets/bootstrap/js/tooltip.js"></script>
        <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>        
        <script src='assets/moment/min/moment.min.js'></script>
        <script src='assets/fullcalendar/dist/fullcalendar.min.js'></script>  
        
        <?php if (isset($endFooter)){
            echo $endFooter;
        }?>
        <script>

         $(document).ready( function () {
        	 $('#table_id').DataTable();
     	     });
        </script>
        
       <script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2014-12-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2014-12-01'
				},
				{
					title: 'Long Event',
					start: '2014-12-07',
					end: '2014-12-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-12-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-12-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2014-12-11',
					end: '2014-12-13'
				},
				{
					title: 'Meeting',
					start: '2014-12-12T10:30:00',
					end: '2014-12-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2014-12-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2014-12-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2014-12-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2014-12-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2014-12-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2014-12-28'
				}
			]
		});
		
	});

</script>

    </body>
</html>