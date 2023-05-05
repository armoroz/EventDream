@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6" style="padding-bottom: 80px;">
				 <h1 class="mb-4">My Projects</h1>
			</div> 
		</div>
		
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<div class='d-flex flex-wrap align-content-start' style="margin:-100px"> 
@if(Auth::check())
@foreach($events as $event)
@if($event->customerid == Auth::user()->customer->id)
  <div class="p-0 col-3 g-3">
	<div class= "bodyoptions-ctm">
	  <div class= "container-ctm">
		<div class="card-ctm">
			<div class="content-ctm" style="margin:-10px">
			<div class="card-header d-block"><h5 class="mx-auto d-block">Project {{ $event->id }}</h5></div>	
			<div class="card-footer"><a href="{{ route('products.displaygrid') }}" class='btn btn-primary'>Add-ons</a></div>
            <div class="card-footer"><a  href="{{ route('events.custshow', [$event->id]) }}"><button id="custshow" type="button" class="btn btn-moreInfo custshow">More info <i class="fas fa-info-circle"></i></button></a></div>				 
			</div> 
		</div>
	  </div> 
	</div>
  </div>
  @endif
    @endforeach
	@endif
</div>

@endsection('content')