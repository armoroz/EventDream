<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>EventDream</title> 
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-chrome-192x192.png') }}">
		<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/android-chrome-512x512.png') }}">
		<link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 

		<!--suppress JSUnresolvedLibraryURL -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/js/star-rating.min.js"></script>
		<script src="{{asset('themes/krajee-fas/theme.js')}}"></script>
		<link rel="stylesheet" href="{{asset('themes/krajee-fas/theme.css')}}">     
		
		<!-- Bootstrap 5.1.3 --> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/eventdream.css')}}">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
		<script src="{{asset('js/app.js')}}"></script>
    </head> 
	
	
    <body>
		<div class="site-wrapper d-flex flex-column min-vh-100">
			<nav class="navbar navbar-expand-sm navbar-dark" style="position: fixed; top: 0; width: 100%; height: 50px; z-index: 9999; background:rgba(255,255,255,.4); backdrop-filter: blur(8px);">		
				<div class="container-fluid">
					<a class="navbar-brand" href="{{route('homepage') }}"><img src="{{asset('img\logo2.png')}}" alt="Logo" style="margin-top: 10px;" width="130" height="60"></a>

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarNav">
					
						@if(Request::url() == route('venues.displaygrid'))
						<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}" style="font-size: 12pt;">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.displaygrid')}}" style="font-size: 12pt; color: #333333;">Venues</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('menuoptions.index')}}" style="font-size: 12pt" >Menus</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('aboutus.index')}}" style="font-size: 12pt" >About Us</a></li>
						@elseif(Request::url() == route('products.displaygrid'))
						<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}" style="font-size: 12pt" >Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('products.displaygrid')}}" style="font-size: 12pt; color: #333333;">Products</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('menuoptions.index')}}" style="font-size: 12pt" >Menus</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('aboutus.index')}}" style="font-size: 12pt" >About Us</a></li>
						@elseif(Request::url() == route('menuoptions.index'))
						<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}" style="font-size: 12pt" >Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('menuoptions.index')}}" style="font-size: 12pt; color: #333333;">Menus</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('aboutus.index')}}" style="font-size: 12pt" >About Us</a></li>
						@else
						<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}" style="font-size: 12pt" >Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('menuoptions.index')}}" style="font-size: 12pt" >Menus</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('aboutus.index')}}" style="font-size: 12pt" >About Us</a></li>
						@endif
						<li class="nav-item">
						@if(Request::url() == route('venues.displaygrid') || Request::url() == route('venues.searchquery'))
							<form action="{{route('venues.searchquery')}}" method="POST">
								@csrf
								<input type="text" name="searchquery">
								<button class="btn btn-primary" style="background-color:lightskyblue; border-color:lightskyblue" type="submit">Search</button>
							</form>
						</li>
						<li class="nav-item">
						@elseif(Request::url() == route('products.displaygrid') || Request::url() == route('products.searchquery'))
							<form action="{{route('products.searchquery')}}" method="POST">
								@csrf
								<input type="text" name="searchquery">
								<button class="btn btn-primary" style="background-color:lightskyblue; border-color:lightskyblue" type="submit">Search</button>
							</form>
						</li>
						<li class="nav-item">
						@elseif(Request::url() == route('standardmenus.displaygrid') || Request::url() == route('standardmenus.searchquery'))
							<form action="{{route('standardmenus.searchquery')}}" method="POST">
								@csrf
								<input type="text" name="searchquery">
								<button class="btn btn-primary" style="background-color:lightskyblue; border-color:lightskyblue" type="submit">Search</button>
							</form>
						@else
							<form action="{{route('products.searchquery')}}" method="POST">
								@csrf
								<input type="text" name="searchquery">
								<button class="btn btn-primary" style="background-color:lightskyblue; border-color:lightskyblue" type="submit">Search</button>
							</form>
						@endif
						</li>
						
						@if(Request::url() == route('products.displaygrid') || Request::url() == route('standardmenus.displaygrid') || Request::url() == route('custommenus.displaygrid') || isset($product) && Request::url() == route('products.custshow', [$product->id]) || isset($standardmenu) && Request::url() == route('standardmenus.custshow', [$standardmenu->id]) || Request::url() == route('venues.searchquery') || Request::url() == route('products.searchquery') || Request::url() == route('standardmenus.searchquery') || Request::url() == route('venues.filtervenues') || Request::url() == route('products.filterproducts') || isset($custommenu) && Request::url() == route('custommenus.custshow', [$custommenu->id]))
						<li class="nav-item"><button id="checkOut" onclick="handleCheckLogin('{{ url('events/all/checkout') }}')" type="button" class="btn btn-primary navbar-btn center-block" style="margin-left:3px; margin-right:3px;">Check Out</button></li> 
						<li class="nav-item"><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
						<li class="nav-item"><span style="font-size:30px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
						<div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:5px;">{{$totalItems}}</div>
						<li class="nav-item"><div class="navbar-text" style="font-size:12pt;margin-left:0px;">Item(s)</div></li>
						
						
						@elseif(isset($product) && isset($event) && Request::url() == route('products.eventdisplaygrid', [$event->id]) || isset($standardmenu) && isset($event) && Request::url() == route('standardmenus.eventdisplaygrid', [$event->id]) || isset($custommenu) && isset($event) && Request::url() == route('custommenus.eventdisplaygrid', [$event->id]))
						<li class="nav-item"><button id="checkOut" onclick="handleCheckLogin('{{ route('events.eventcheckout', [$event->id]) }}')" type="button" class="btn btn-primary navbar-btn center-block" style="margin-left:3px; margin-right:3px;">Check Out</button></li> 
						<li class="nav-item"><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
						<li class="nav-item"><span style="font-size:30px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
						<div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:5px;">{{$totalItems}}</div>
						<li class="nav-item"><div class="navbar-text" style="font-size:12pt;margin-left:0px;">Item(s)</div></li>	
						@endif
						
						@include('layouts.navAuth')
						</ul>
					</div>
				</div>
			</nav>
			
			<div id="page-content-wrapper"> 
				<div class="container-fluid"> 
					<div class="row"> 
						<div class="col-lg-2" style="padding-top: 60px;">@yield('side')</div> 
						<div class="col-lg-8" style="padding-top: 60px;"> @yield('content') </div> 
						<div class="col-lg-2" style="padding-top: 60px;">@yield('side2')</div> 
					</div> 
				</div> 
			 </div> 
			 
			<footer class="footer bg-theme" style="margin-top: 80px;">
				<div class="container py-5">
					<div class="row" style="margin-left:50px;">
						<div class="col-lg-3">
							<h4 class="col-heading">Highlights</h4>
							<ul>
								<li><a href="{{route('homepage')}}">Home</a></li>
								<li><a href="{{route('venues.displaygrid')}}">Venues</a></li>
								<li><a href="{{route('products.displaygrid')}}">Products</a></li>
								<li><a href="{{route('menuoptions.index')}}">Menus</a></li>
								<li><a href="{{route('venues.showmap')}}">Map</a></li>
								<li><a href="{{route('aboutus.index')}}">About Us</a></li>
							</ul>
						</div>

						<div class="col-lg-3">
							<h4 class="col-heading">Resources</h4>
							<ul>
								<li><a href="{{route('aboutus.index')}}">FAQs</a></li>
								<li>Support</li>
								<li>News</li>
								<li>Blog</li>
							</ul>
						</div>

						<div class="col-lg-3">
							<h4 class="col-heading">Legal</h4>
							<ul>
								<li>Security</li>
								<li>Privacy</li>
								<li>Terms of Service</li>
							</ul>
						</div>

						<div class="col-lg-3">
							<h4 class="col-heading" style="margin-bottom: -6px;">Stay Connected</h4><br>
							<ul class="socialnetwork">
								<li class="list-inline-item">
									<a href="https://twitter.com/">
										<i class="fab fa-twitter"></i>
									</a>
								</li>

								<li class="list-inline-item">
									<a href="https://www.instagram.com/">
										<i class="fab fa-instagram"></i>
									</a>
								</li>
								
								<li class="list-inline-item">
									<a href="https://www.facebook.com/">
										<i class="fab fa-facebook"></i>
									</a>
								</li>
								
								<li class="list-inline-item">
									<a href="https://www.linkedin.com/login/">
										<i class="fab fa-linkedin"></i>
									</a>
								</li>
							</ul>

							<div class="contact-list">
							  <ul>
							  <i class="fas fa-envelope" style="font-size: 19px;"></i>
							  <a href="info@eventdream.ie" style="margin-left: 2px;">info@eventdream.ie</a><br>
							  <i class="fas fa-phone" style="font-size: 19px;"></i>
							  <a href="(01) 567 8923" style="margin-left: 2px;">(01) 567 8923</a>
							  </ul>
							</div>								
							
							<div class="locationadd">
							  <ul>
								<li>EventDream Limited</li>
								<li>154 Rathmines</li>
								<li>Dublin 14</li>
								<li>Ireland</li>
							  </ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="container" style="margin-top: -100px">
					<div class="container text-center">
						<h3 class="mb-3" style="font-size: 16pt;">Get our App!</h3>
						<ul class="d-inline-block">
							<li class="list-inline-item mr-3">
								<a href="">
									<img src="{{asset('img/applegoogle.png')}}" alt="" class="appstore" width="40%">
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="footer-bottom text-center pb-5">
					<small class="madewithlove">
						Made with <i class="fas fa-heart" style="color: #8b0000;"></i>
					    for Eventdream customers <br>
						© 2023 EventDream™
					</small>
				</div>
			</footer>


			<script>
			let isAuthenticated = @json(auth()->check());

			function handleCheckLogin(url) {
			  if (isAuthenticated) {
				window.location.href = url;
			  } else {
				let result = confirm('You must login or sign up to view this page. Click OK to login or Cancel to stay on this page.');
				if (result) {
				  window.location.href = '{{ url("login") }}';
				}
			  }
			}
			</script>

		</div>	  
	</body>
</html>