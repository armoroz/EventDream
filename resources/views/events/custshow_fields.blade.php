<section>
	<div class="container">
		<div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap; margin-left: 30px;">
			<div>
				<!-- Eventname Field -->
				<div class="col-sm-12">
					{!! Form::label('eventname', 'Event name:') !!}
					<p>{{ $event->eventname }}</p>
				</div>
				
				<!-- Eventdate Field -->
				<div class="col-sm-12">
					{!! Form::label('eventdate', 'Event Date:') !!}
					<p>{{ $event->eventdate->format('Y-m-d') }}</p>
				</div>

				<!-- Eventtime Field -->
				<div class="col-sm-12">
					{!! Form::label('eventtime', 'Event Time:') !!}
					<p>{{ $event->eventtime }}</p>
				</div>

				<!-- Orderplacedon Field -->
				<div class="col-sm-12">
					{!! Form::label('orderplacedon', 'Order Date:') !!}
					<p>{{ $event->orderplacedon }}</p>
				</div>

				<!-- Eventordertotal Field -->
				<div class="col-sm-12">
					{!! Form::label('eventordertotal', 'Order Total:') !!}
					<p>{{ $event->eventordertotal }}</p>
				</div>

				<!-- Event status Field 
				<div class="col-sm-12">
					{!! Form::label('eventstatus', 'Event Status:') !!}
					<p>{{ $event->eventstatus }}</p>
				</div> -->
			</div>
			
			<div style="margin-left: 50px;">

				<!-- Eventdiscount Field 
				<div class="col-sm-12">
					{!! Form::label('eventdiscount', 'Event Discount:') !!}
					<p>{{ $event->eventdiscount }}</p>
				</div>-->

				<!-- Venue Field -->
				<div class="col-sm-12">
					{!! Form::label('venue', 'Venue') !!}
					<p>{{ $event->venue->venuename ?? 'N/A' }}</p>
				</div>

				<!-- Customerid Field -->
				<div class="col-sm-12">
					{!! Form::label('customerid', 'Customer:') !!}
					<p>{{ Auth::user()->customer->firstname }}</p>
				</div>


				<!-- Standardmenuid Field -->
				<div class="col-sm-12">
					{!! Form::label('standardmenuid', 'Standard Menu:') !!}
					<p>{{ $event->standardmenu->standardmenuname ?? 'None chosen'}}</p>
				</div>

				<!-- Custommenuid Field -->
				<div class="col-sm-12">
					{!! Form::label('custommenuid', 'Custom Menu:') !!}
					<p>{{ $event->custommenu->custommenuname ?? 'None chosen'}}</p>
				</div>

				<!-- Numofguests Field -->
				<div class="col-sm-12">
					{!! Form::label('numOfGuests', 'No. of Guests:') !!}
					<p>{{ $event->numOfGuests }}</p>
				</div>
			</div>
			
			
				<!-- Event products field -->
				
			@if($event->eventstatus == 'Event')
				
			<div style="margin-left: 50px;">
				<div class="col-sm-12">
					{!! Form::label('eventproducts', 'Event Decor:') !!}
					<ul>
						@foreach($event->eventproductlogs as $eventProductLog)
							<li>
								{{ optional($eventProductLog->product)->productname }}
								{{ optional($eventProductLog->product)->producttype }}
								€{{ optional($eventProductLog->product)->productcost }}
								x{{ $eventProductLog->eventproductquantity }}
							</li>
						@endforeach
					</ul>
				</div>
			</div>
                <div class="col-sm-6" style="margin-left: 0px;">
                    <a class="btn btn-primary1 float-right"
                       href="{!! route('events.custindex', [Auth::user()->customer->id]) !!}">
                        Back to events
                    </a>
                </div>	
				
			@elseif($event->eventstatus == 'Project')
			<div style="margin-left: 50px;">
				<div class="col-sm-12">
					{!! Form::label('eventproducts', 'Event Decor:') !!}
					<ul>
						@foreach($event->eventproductlogs as $eventProductLog)
							<li>
								{{ optional($eventProductLog->product)->productname }}
								{{ optional($eventProductLog->product)->producttype }}
								€{{ optional($eventProductLog->product)->productcost }}
								x{{ $eventProductLog->eventproductquantity }}

								{!! Form::open(['route' => ['eventproductlogs.custdestroy', $eventProductLog->id], $event->id, 'method' => 'delete', 'style' => 'display:inline']) !!}
									{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'background-color: #660000; border-color: #660000; margin-left: 30px;', 'onclick' => "return confirm('Are you sure you want to delete this product from the event?')"]) !!}
								{!! Form::close() !!}
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			
                <div class="col-sm-6" style="margin-left: 0px;">
                    <a class="btn btn-primary1 float-right"
                       href="{!! route('events.projectindex', [Auth::user()->customer->id]) !!}">
                        Back to projects
                    </a>
                </div>	
				
			@endif
		</div>
	</div>
</section>



<style>

.col-lg-8 {
	min-width: 1000px;
}

.card {
	background-color: transparent;
}

section {
	box-shadow: 0 6px 21px rgba(0,0,0,1);
}

.card {
	border: none;
}

</style>
