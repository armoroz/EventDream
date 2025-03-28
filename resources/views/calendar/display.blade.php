@extends('layouts.app') 
@section('content') 
@include('calendar.assets')
@include('calendar.modalbooking')
@include('flash::message') 
<link href="{{ asset('core/main.css')}}" rel='stylesheet' /> 
<link href="{{ asset('daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('timegrid/main.css')}}" rel='stylesheet' /> 
<link href="{{ asset('list/main.css')}}" rel='stylesheet' /> 
<script src="{{ asset('core/main.js')}}"></script> 
<script src="{{ asset('interaction/main.js')}}"></script> 
<script src="{{ asset('daygrid/main.js')}}"></script> 
<script src="{{ asset('timegrid/main.js')}}"></script> 
<script src="{{ asset('list/main.js')}}"></script> 

<div class="button-container">
<a class="btn btn-primary" href="{{ route('venues.displaygrid') }}">Back to Venues</a>
</div>
<button class="btn btn-primary" style="margin: 10px 0px 10px 0px;" onclick="bookmarkPage()">Bookmark This Page</button>

<div id="calendar"></div> 
<script> 
		$(function () {
		$('body').on('click', '#submitButton', function (e) {
        $(this.form).submit();
        $('#fullCalModal').modal('hide');
    });
});
    document.addEventListener('DOMContentLoaded', function() { 
        var calendarEl = document.getElementById('calendar'); 
        var calendar = new FullCalendar.Calendar(calendarEl, { 
          plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
          header: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' }, 
          slotDuration: '00:10:00', 
          defaultDate: new Date().toISOString().substring(0, 10), 
          editable: true, 
          eventLimit: true, // allow "more" link when too many events   
          events: "{{url('calendar/all/json')}}",
		   dateClick: function(info){
				$('#eventtime').val('');
				$('#eventDate').val(info.dateStr);
				$('#venueid').val
				$('#fullCalModal').modal('show');
			}
		  
		  

            
 
 
	 }); 
     calendar.render(); }); 
</script> 
<style>
.fc-content {
	background-color: pink;
	border-color: pink;
}
.fc-event-container {
	background-color: pink;
	border-color: pink;
}
.fc-draggable {
	background-color: pink;
	border-color: pink;
}
</style>
@endsection