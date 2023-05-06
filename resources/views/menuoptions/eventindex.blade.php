@extends('layouts.app')
@section('content')
@include('flash::message')

<h1 style="text-align: center; margin-top: 20px; margin-left: 90px; font-family: Garamond, serif;">Menu Options</h1>

<style>
footer {
  display: none;
}

.col-lg-2{
	max-width: 13%;
}
</style>

<div class= "bodyoptions-mopt">
  <div class= "container-mopt">
	<div class="card-mopt">
	  <div class="box-image-mopt">
        <img src="{{asset('img\img1.jpg')}}">
      </div>
    <div class="content-mopt">
		<h2>Standard Menus</h2>
		<p>Explore our menus ranging from traditional Irish cuisine 
		to exotic African delights!</p>
		 <a class="btn btn-primary1 mx-2" href="{{ route('standardmenus.eventdisplaygrid', [$event->id]) }}">Open</a>
	</div>
   </div>
	<div class="card-mopt">
	  <div class="box-image-mopt">
        <img src="{{asset('img\img2.jpg')}}">
      </div>
    <div class="content-mopt">
		<h2>Our Dishes</h2>
		<p>Browse menu items to view ingredients, allergens, and so on.
		Or even better! Make your own customised menu just how you like it!</p>
		<a class="btn btn-primary1 mx-2" href="{{ route('menuitems.displaygrid') }}">Open</a>
	</div>
   </div>
	<div class="card-mopt">
	  <div class="box-image-mopt">
        <img src="{{asset('img\img3.jpg')}}">
      </div>
    <div class="content-mopt">
		<h2>Custom Menus</h2>
		<p>Review your previously made customised menus 
		to simply order them again for your upcoming event. Time-saving, right!</p>
		<a class="btn btn-primary1 mx-2" href="{{ route('custommenus.eventdisplaygrid', [$event->id]) }}">Open</a>
	</div>
   </div>
  </div>
</div>
@endsection('content')