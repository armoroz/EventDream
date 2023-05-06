<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -40px;">
        <li>
            <a class="dropdown-item" style="font-weight: bold; font-size: 9pt;">Welcome  {{ Auth::user()->customer->firstname }}</a>
        </li>
		<li>
            <a class="dropdown-item" href="{!! route('customers.custshow', [Auth::user()->customer->id]) !!}">View Profile</a>
        </li>
        <li>
            <a class="dropdown-item" href="{!! route('events.custindex', [Auth::user()->customer->id]) !!}">View Events</a>
        </li>
        <li>
            <a class="dropdown-item" href="{!! route('events.projectindex', [Auth::user()->customer->id]) !!}">View Projects</a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="{!! route('logout') !!}">Logout</a>
        </li>
    </ul>
</li>
