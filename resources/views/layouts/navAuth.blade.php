<ul class="nav navbar-nav pull-right"> 
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
</ul>