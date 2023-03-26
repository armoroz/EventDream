<li class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Profile</button>
    <ul class="dropdown-menu">
        <li>
             <a class="dropdown-item" href="{!! route('customers.create') !!}">Edit Profile</a>
        </li>
		<li><hr class="dropdown-divider"></li>
		<a class="dropdown-item" href="{!! route('logout') !!}">Logout</a>
		</li>
    </ul>
</li>