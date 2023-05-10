<li class="nav-item dropdown" style="margin-right: -5px;">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Admin Menu
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
             <a class="dropdown-item" href="{!! route('users.index') !!}">Users</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('roles.index') !!}">Roles</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('permissions.index') !!}">Permissions</a>
        </li>
		<li><hr class="dropdown-divider"></li>
        <li>
             <a class="dropdown-item" href="{!! route('customers.index') !!}">Customers</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('calendar.display') !!}">Calendar</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('events.index') !!}">Events</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('eventproductlogs.index') !!}">Event Product Log</a>
        </li>
        <li>   
			 <a class="dropdown-item" href="{!! route('products.index') !!}">Products</a>
        </li>
        <li>   
			 <a class="dropdown-item" href="{!! route('venues.showmap') !!}">Map</a>
        </li>
        <li>   
			 <a class="dropdown-item" href="{!! route('venues.index') !!}">Venues</a>
        </li>		
		<li>
             <a class="dropdown-item" href="{!! route('venueratings.index') !!}">Venue Ratings</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('venueimages.index') !!}">Venue Images</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('menuitems.index') !!}">Menu Items</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('standardmenus.index') !!}">Standard Menus</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('standardmenulogs.index') !!}">Standard Menu Log</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('standardmenuratings.index') !!}">Stardard Menu Ratings</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('standardmenuimages.index') !!}">Standard Menu Images</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('custommenus.index') !!}">Custom Menus</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('custommenulogs.index') !!}">Custom Menu Log</a>
        </li>
    </ul>
</li>