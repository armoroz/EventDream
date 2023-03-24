<li class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Admin Menu</button>
    <ul class="dropdown-menu">
        <li>
             <a class="dropdown-item" href="{!! route('users.index') !!}">Users</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('roles.index') !!}">Roles</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('permissions.index') !!}">Permissions</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('customers.index') !!}">Customer List</a>
        </li>
        <li>
             <a class="dropdown-item" href="{!! route('bookings.index') !!}">Bookings</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('events.index') !!}">Event List</a>
        </li>
		<li>
             <a class="dropdown-item" href="{!! route('eventproductlogs.index') !!}">Event Log</a>
        </li>
        <li>   
			 <a class="dropdown-item" href="{!! route('products.index') !!}">Products</a>
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