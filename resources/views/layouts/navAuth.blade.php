<!--<ul class="nav navbar-nav pull-right"> 
	@if(Auth::guest())
		<li>
			<a href="{{route('register')}}">Register
				<span class="glyphicon glyphicon-pencil"></span>
			</a>
		</li> 
		<li>
			<a href="{{route('login')}}">Login
				<span class="glyphicon glyphicon-log-in"></span>
			</a>
		</li> 
	@else
		<li>
			<a href="{{route('logout')}}">Logout
				<span class="glyphicon glyphicon-log-out"></span>
			</a>
		</li> 
	@endif
</ul>-->

<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
	@if(Auth::check())
		@if(Auth::user()->hasRole('System Admin'))
			 @include('layouts.adminmenu')
		@elseif(Auth::user()->hasRole('Warehouse Worker'))
		@include('layouts.stockmenu')
		@endif
		@include('layouts.profilemenu')
		<li><a href="{!! route('logout') !!}"><span class="glyphicon glyphicon-log-out" style="font-size: 12pt"></span> Logout</a></li>
	@else
		<li><a href="{!! route('login') !!}"><span class="glyphicon glyphicon-log-in" style="font-size: 12pt"></span> Login</a></li>
		<li><a href="{!! route('register') !!}"><span class="glyphicon glyphicon-user" style="font-size: 12pt"></span> Register</a></li>
	@endif
</ul>