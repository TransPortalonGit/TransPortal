@extends('layouts.master')
@section('head')

{{HTML::style('/css/fullcalendar.css')}}
{{HTML::style('/css/fullcalendar.print.css')}}
{{HTML::style('/css/jquery.datetimepicker.css')}}
{{HTML::script('/js/fullcalendar.min.js')}}
{{HTML::script('/js/jquery.datetimepicker.js')}}
	<script type="text/javascript"> 
        $(function(){


			  		
        	// Function date and time picker
            $(".set-date1").hide();
            $("#appnt").click(function(){
		    	$(".set-date1").toggle();
		  	});

		  	$("#done1").click(function(){
		  		$(".set-date1").hide();
		  	});

		  	$(".set-date2").hide();
		  	$("#resv").click(function(){
		  		$(".set-date2").toggle();
		  	});
		  	$("#done2").click(function(){
		  		$(".set-date2").hide();
		  	});

		  	//The info box for user without reservation permission

		  	$(".info-box").hide();
		  	$("#resv1").click(function() {
		  		$(".info-box").toggle();
		  	});
			

		  	// Selecting different machines for displaying time slot
		  	
		  	$("#machine-choice").change(function(){
		  			    

			  		if ($(this).val() == "3D printer") {

			  			$(".3P-table").toggle();
			  			$(".CS-table, .PG-table, .LC-table, .calendar").hide();		

			  			
			  		}
			  		else if ($(this).val() == "Laser cutter") {
			  			$(".LC-table").toggle();
			  			$(".CS-table, .PG-table, .3P-table , .calendar").hide();
			  			
			  		}
			  		else if ($(this).val() == "Chainsaw") {
			  			$(".CS-table").toggle();
			  			$(".LC-table, .PG-table, .3P-table, .calendar").hide();

			  		}
			  		else if ($(this).val() == "Portal gun") {
			  			$(".PG-table").toggle();
			  			$(".LC-table, .CS-table, .3P-table, .calendar").hide();
			  			
			  		}
			  		
			  		else {
			  			$(".LC-table, .CS-table, .PG-table, .3P-table").hide();
			  			location.reload();
			  			
			  		}
			  		
			  	});

			

			  

		  	//Loads different calendars

			
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'agendaWeek,agendaDay'
					},
					editable: true,
					/////////////////Feed event data in this events var//////////////////////
					events: 
					[
					 	{
			            title  : 'event1',
			            start  : '2014-02-06 12:30:00',
			            end    : '2014-02-06 14:30:00',
           				allDay : false 
			        	},
			        	{
			            title  : 'event2',
			            start  : '2014-02-06 13:30:00',
           				allDay : false 
			        	},
			        ],
			        //////////////////////////////////////////////////////////////
					hiddenDays: [0],
					defaultView: 'agendaWeek',
					minTime: '8:00',
					maxTime: '22:00',
					allDaySlot: false,
					slotEventOverlap: false,
				});

				
				$('#LC-table').fullCalendar({
					header: {
						left: 'prev,next today',
					
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
					events: 
					[
					 	
			        ],
					hiddenDays: [0],
					defaultView: 'agendaWeek',
					minTime: '8:00',
					maxTime: '22:00',
					allDaySlot: false,
					slotEventOverlap: false,
				});

				 $('#3P-table').fullCalendar({
					header: {
						left: 'prev,next today',
						
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
					events: 
					[
					 	
			        ],
					hiddenDays: [0],
					defaultView: 'agendaWeek',
					minTime: '8:00',
					maxTime: '22:00',
					allDaySlot: false,
					slotEventOverlap: false,
				});

				$('#CS-table').fullCalendar({
					header: {
						left: 'prev,next today',
						
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
					events: 
					[
					 	
			        ],
					hiddenDays: [0],
					defaultView: 'agendaWeek',
					minTime: '8:00',
					maxTime: '22:00',
					allDaySlot: false,
					slotEventOverlap: false,
				});

				$('#PG-table').fullCalendar({
					header: {
						left: 'prev,next today',
						
						right: 'agendaWeek,agendaDay'
					},
					editable: true,
					events: 
					[
					 	
			        ],
					hiddenDays: [0],
					defaultView: 'agendaWeek',
					minTime: '8:00',
					maxTime: '22:00',
					allDaySlot: false,
					slotEventOverlap: false,
				});
		  		  	
        });
    </script>
    

    

	
@stop

@section('content')
<div class="row">
	<div class="col-xs-12"> 
		<div class="content_container container">

			@include('site.profile._user_profileheader')			

			@include('site.profile._user_navigation')
		<div class="appointment-wrapper">	
			<div class="next-appointment">
				<p>Upcoming Events</p>
				 <!--Modal for Appointment/Reservation remove popup menu-->            
	            <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	              <div class="modal-dialog modal-lg">
	                <div class="modal-content">
	                  <div><h4>Remove Item</h4></div> 
	                  <hr>                 
	                   <form role="form">
	                      <div class="form-group">	                        
	                        <h5>Are you sure you want to remove this?</h5>
	                      </div>
	                      <button type="submit" class="btn btn-warning">Cancel</button>
	                      <button type="submit" class="btn btn-success">Remove</button>
	                    </form>          
	                </div>
	              </div>
	            </div>
            <!--/ end Modal for Appointment/Reservation remove popup menu-->
				
					<ul style="list-style: none; ">
						<li id="change-label" data-toggle="modal" data-target=".bs-modal-lg" > <a href="#" >24/02 9:00 - Prof. Oak</a> <span id="remove-appointment"><a href="#">Remove</a></span></li>
						<li id="change-label" data-toggle="modal" data-target=".bs-modal-lg"> <a href="#">25/02 10:00 - Laser cutter</a> <span id="remove-appointment"><a href="#">Remove</a></span></li>
					</ul>
			
			</div>
			<div class="add-appointment">
				
				<button type="button" id="appnt" class="btn btn-primary">Make appointment<span class="caret"></span></button>
					<form role="form" class="set-date1" style="margin-top: 10px;">
						<input type="text" class="form-control" placeholder="with whom?" style="border: 1px solid #ccc; margin-bottom: 10px;">
				    	<div  style="width: 200px; margin-bottom: 10px;">				    					    
						    <input id="datetimepicker1" type="text" style="width: 180px;" readonly>
						    <i id="show-date1" class="fa fa-clock-o"></i>			    
				    	</div>
				    	<button type="submit" id="done1" class="btn btn-primary">submit</button>
			    	</form>	

			    @if (Sentry::getUser()->hasAccess('3d_printer') || Sentry::getUser()->hasAccess('lasercutter'))			 
				
				<button type="button" id="resv" class="btn btn-primary">Make reservation <span class="caret"></span></button>
					<form role="form" class="set-date2" style="margin-top: 10px;">
						<select id= "machine-choice" class="form-control" style="border: 1px solid #ccc; margin-bottom: 10px;">
						  <option value="Choose machine" >Choose machine</option>
						  @if (Sentry::getUser()->hasAccess('3d_printer'))
						  <option value="3D printer" >3D printer</option>
						  @endif
						  @if (Sentry::getUser()->hasAccess('lasercutter'))
						  <option value="Laser cutter" >Laser cutter</option>
						  @endif
						   <option value="Portal gun" >Portal Gun</option>
						 
						</select>
				    	<div  style="width: 200px; margin-bottom: 10px;">				    					    
						    <input id="datetimepicker2" type="text" style="width: 180px;" readonly>
						    <i id="show-date2" class="fa fa-clock-o"></i>			    
				    	</div>
				    	<button type="submit" id="done2" class="btn btn-primary">submit</button>
			    	</form>
			    @else
			    <button type="button" id="resv1" class="btn btn-primary">Make reservation <span class="caret"></span></button>
			    <br>
			    <div class="info-box">
			    	<div>
			    		<p style="background-color:#4b4b4b; font-size: 12px; color: #ffffff; text-align: left; border: 1px solid #4b4b4b;">
			    			You need to get the mandatory introduction course to book these machines. Contact our <a href="/home" style="color: #BBE2BB;"><strong>admin</strong></a> to arrange the course.</p>
			    	</div>


			    </div>
			    @endif

			</div>
		</div>

		<div class="calendar-wrapper">
			<div class="calendar">
				<div id="calendar"></div>
			</div>
		
			<div class="3P-table">
				<h3>Time slots for 3D Printer</h3>
				<div id="3P-table"> </div>
			</div> 
			<div  class="LC-table">
				<h3>Time slots for Laser cutter</h3>
				<div id="LC-table"></div>
			</div> 
			<div  class="CS-table">
				<h3>Time slots for Chainsaw</h3>
				<div id="CS-table"></div>
			</div> 
			<div class="PG-table">
				<h3>Time slots for Portal gun</h3>
				<div id="PG-table" ></div>
			</div> 			
		</div>
		

		
		    

		    <script type="text/javascript">
		    	$('#datetimepicker1').datetimepicker({
		    		allowTimes:['9:00', '10:00', '11:00', '12:00',
		    		'13:00', '14:00', '15:00', '16:00', '17:00', '18:00',
		    		'19:00',],
		    		 minDate:'-1970/01/01', 
		    		 dayOfWeekStart: 1,

		    	});
		    	$('#show-date1').click(function(){
				  $('#datetimepicker1').datetimepicker('show'); //support hide,show and destroy command
				});

				$('#datetimepicker2').datetimepicker({
		    		allowTimes:['9:00', '10:00', '11:00', '12:00',
		    		'13:00', '14:00', '15:00', '16:00', '17:00', '18:00',
		    		'19:00',],
		    		 minDate:'-1970/01/01', 
		    		 dayOfWeekStart: 1,

		    	});
		    	$('#show-date2').click(function(){
				  $('#datetimepicker2').datetimepicker('show'); //support hide,show and destroy command
				});

		    </script>

		    <!-- All available options for date/time picker

		    <script type="text/javascript">
				
				$('#datetimepicker').datetimepicker({
				value:'',
				lang:'en',
				format:'Y/m/d H:i',
				formatTime:'H:i',
				formatDate:'Y/m/d',
				step:60,
				closeOnDateSelect:0,
				closeOnWithoutClick:true,
				timepicker:false,
				datepicker:true,
				minDate:false,
				maxDate:false,
				minTime:false,
				maxTime:false,
				allowTimes:[],
				opened:false,
				inline:true,
				onSelectDate:function(){},
				onSelectTime:function(){},
				onChangeMonth:function(){},
				onChangeTime:function(){},
				onShow:function(){},
				onClose:function(){},
				withoutCopyright:true,
				inverseButton:false,
				hours12:false,
				next:'xdsoft_next',
				prev : 'xdsoft_prev',
				dayOfWeekStart:0,
				timeHeightInTimePicker:25,
				});

				$('#show-date').click(function(){
				  $('#dtBox').datetimepicker('show'); //support hide,show and destroy command
				});
			</script>

		-->
		   

		



		</div>
	</div>
</div>
@stop