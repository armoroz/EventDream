<div class='d-flex flex-wrap align-content-start bg-transparent' style="margin-right:-100px; margin-left:-100px;"> 
    @foreach($events as $event) 
	<div class="p-0 col-4 g-4">
		<div class= "bodyoptions-stdm">
			<div class= "container-stdm">
				<div class="card-stdm" style="height: 100%;">
					<div class="box-image-stdm">
						<div class="image-wrapper">
							@foreach($event->venue->venueimages->take(1) as $venueimage)
							<img  class="mx-auto d-block" src="data:image/jpeg;base64,{{$venueimage->imagefile}}"/>
							@endforeach
						</div>
					</div>
						<div class="content-stdm">
							<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $event->eventname }}</h5></div>
							<div class="card-footer" style="text-align: center">{{ $event->venue->venuename ?? 'N/A' }}</div>
							<div class="card-footer" style="text-align: center">€{{ $event->eventordertotal }}</div>
							<div class="card-footer" style="text-align: center">{{ $event->eventdate->format('Y-m-d') }}</div>
							<div class="card-footer"><a  href="{{ route('events.custshow', [$event->id]) }}"><button id="custshow" style="background-color: #444452;" type="button" class="btn btn-primary1 custshow">Details <i class="fas fa-info-circle"></i></button></a></div>
							<div class="card-footer" style="text-align: center"><a href="{{ route('products.eventdisplaygrid', [$event->id]) }}" class='btn btn-primary1'>Add-Ons<i class="fas fa-plus" style='font-size: 1.1em; margin-left: 5px;'></i></a></div>
						</div>
				</div>
			</div>
		</div>
	</div> 
    @endforeach
</div>

<style>
.card {
	background-color: transparent;
	border-color: transparent;
}
</style>