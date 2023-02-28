@extends('layouts.app') 
@section('content') 
@include('calendar.assets')
@include('calendar.modalbooking')
<link href="{{ asset('core/main.css')}}" rel='stylesheet' /> 
<link href="{{ asset('daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('timegrid/main.css')}}" rel='stylesheet' /> 
<link href="{{ asset('list/main.css')}}" rel='stylesheet' /> 
<script src="{{ asset('core/main.js')}}"></script> 
<script src="{{ asset('interaction/main.js')}}"></script> 
<script src="{{ asset('daygrid/main.js')}}"></script> 
<script src="{{ asset('timegrid/main.js')}}"></script> 
<script src="{{ asset('list/main.js')}}"></script> 
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
          defaultDate: '2023-03-01', 
          editable: true, 
          eventLimit: true, // allow "more" link when too many events   
          events: '{{ route('calendar.json') }}',
		   dateClick: function(info) {
            $('#starttime').val(info.date.toISOString().substring(11,16));
            $('#bookingDate').val(info.date.toISOString().substring(0,10));
            $('#fullCalModal').modal('show');


 }
            
 
 
	 }); 
     calendar.render(); }); 
</script> 
@endsection
