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
@foreach($projects as $project)
@if($project->customerid == Auth::user()->customer->id)
  <div class="p-0 col-3 g-3">
	<div class= "bodyoptions-ctm">
	  <div class= "container-ctm">
		<div class="card-ctm">
			<div class="content-ctm" style="margin:-10px">
			<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $project->eventdate }}</h5></div>	
			<div class="card-footer"><a href="{{ route('projects.edit', [$project->id]) }}"> <button class="btn btn-default btn-xs" title="Add on">Add on <i class="far fa-edit"></i></a></div>		
            <div class="card-footer"><a  href="{{ route('projects.custshow', [$project->id]) }}"><button id="custshow" type="button" class="btn btn-moreInfo custshow">More info <i class="fas fa-info-circle"></i></button></a></div>				 
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