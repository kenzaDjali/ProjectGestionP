       
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="assets/jquery/dist/jquery.min.js"></script> 
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/excanvas.min.js"></script> 
        <script src="js/chart.min.js" type="text/javascript"></script> 

        <script type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>        
        
        <script src="js/base.js"></script>
        
        <!-- DataTables -->

        <script type="text/javascript"  src="assets/datatables/media/js/jquery.dataTables.js"></script>

      
        <?php if (isset($endFooter)){
            echo $endFooter;
        }?>
      

        <script>     
        
                var lineChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
        				{
        				    fillColor: "rgba(220,220,220,0.5)",
        				    strokeColor: "rgba(220,220,220,1)",
        				    pointColor: "rgba(220,220,220,1)",
        				    pointStrokeColor: "#fff",
        				    data: [65, 59, 90, 81, 56, 55, 40]
        				},
        				{
        				    fillColor: "rgba(151,187,205,0.5)",
        				    strokeColor: "rgba(151,187,205,1)",
        				    pointColor: "rgba(151,187,205,1)",
        				    pointStrokeColor: "#fff",
        				    data: [28, 48, 40, 19, 96, 27, 100]
        				}
        			]
        
                }
        
                //var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);
        
                var barChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
        				{
        				    fillColor: "rgba(220,220,220,0.5)",
        				    strokeColor: "rgba(220,220,220,1)",
        				    data: [65, 59, 90, 81, 56, 55, 40]
        				},
        				{
        				    fillColor: "rgba(151,187,205,0.5)",
        				    strokeColor: "rgba(151,187,205,1)",
        				    data: [28, 48, 40, 19, 96, 27, 100]
        				}
        			]
        
                }    
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
        </script><!-- /Calendar -->
    </body>
</html>
