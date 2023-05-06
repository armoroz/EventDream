<ul class="navbar-nav ms-auto">
	@if(Auth::check())
		@if(Auth::user()->hasRole('System Admin'))
			 @include('layouts.adminmenu')
		@elseif(Auth::user()->hasRole('Warehouse Worker'))
		@include('layouts.stockmenu')
		@endif
		@include('layouts.profilemenu')
	@else
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			Sign In
		</a>
		<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			<li>
				 <a class="dropdown-item" href="{!! route('register') !!}">Register</a>
			</li>
			<li>
				 <a class="dropdown-item" href="{!! route('login') !!}">Login</a>
			</li>
		</ul>
	</li>		
	@endif
</ul>


