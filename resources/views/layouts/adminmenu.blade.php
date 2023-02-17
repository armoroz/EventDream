<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 12pt">Admin Menu
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li>
             <a href="{!! route('users.index') !!}">Users</a>
        </li>
        <li>
             <a href="{!! route('roles.index') !!}">Roles</a>
        </li>
        <li>
             <a href="{!! route('permissions.index') !!}">Permissions</a>
        </li>
        <li>   
			 <a href="{!! route('products.index') !!}">Products</a>
        </li>
        <li>
             <a href="{!! route('customers.index') !!}">Customer List</a>
        </li>
        <li>
             <a href="{!! route('bookings.index') !!}">Bookings</a>
        </li>
		<li>
             <a href="{!! route('venueratings.index') !!}">Venue Ratings</a>
        </li>
		<li>
             <a href="{!! route('events.index') !!}">Event List</a>
        </li>
		<li>
             <a href="{!! route('eventproductlogs.index') !!}">Event Log</a>
        </li>
    </ul>
</li>