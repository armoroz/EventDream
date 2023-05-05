@extends('layouts.app')

@section('content')
	
	@if($event->eventstatus == 'Event')
        <h1 style="text-align: center; font-family: Garamond, serif;">Your Event Details</h1>
	
	@elseif($event->eventstatus == 'Project')
		<h1 style="text-align: center; font-family: Garamond, serif;">Your Project Details</h1>
		<h2 style="text-align: center; font-family: Garamond, serif;">Notice - This is not a confirmation of booking</h2>
	
	@endif


    <div class="content px-3">
        <div class="card">
            <div class="card-body p-0">
                    @include('events.custshow_fields')				
            </div>
        </div>
    </div>
@endsection
