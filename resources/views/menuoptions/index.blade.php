@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Options</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-primary mx-2" href="{{ route('standardmenus.displaygrid') }}">
                Standard Menus
            </a>
            <a class="btn btn-primary mx-2" href="{{ route('custommenus.displaygrid') }}">
                Custom Menus
            </a>
            <a class="btn btn-primary mx-2" href="{{ route('menuitems.displaygrid') }}">
                Menu Items
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="card-footer clearfix">
                    <div class="float-right"></div>
                </div>
            </div>
        </div>
    </div>
	
<!doctype html>
<html>
<head>
	<meta name= "viewport" content= "width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
</head>
<div class= "bodymenuoptions">
  <div class= "container">
	<div class="menucard">
	  <div class="box-image">
        <img src="images\vendor\leaflet\dist\img1.jpg">
      </div>
    <div class="content">
		<h2>Standard Menus</h2>
		<p>Explore our menus ranging from traditional Irish cuisine 
		to exotic African delights!</p>
	</div>
   </div>
	<div class="menucard">
	  <div class="box-image">
        <img src="images\vendor\leaflet\dist\img2.jpg">
      </div>
    <div class="content">
		<h2>Menu Items</h2>
		<p>Read more information on individual menu items 
		to browse through the ingredients included, allergens, and so on.
		Or even better! Make your own customised menu just how you like it!</p>
	</div>
   </div>
	<div class="menucard">
	  <div class="box-image">
        <img src="images\vendor\leaflet\dist\img3.jpg">
      </div>
    <div class="content">
		<h2>Custom Menus</h2>
		<p>Review your previously made customised menus 
		to simply order them again for your upcoming event. Time-saving, right!</p>
	</div>
   </div>
  </div>
</div>
</html>
@endsection
