<section>
    <div class="container">
        <div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap;">
            <div class="carousel">
                @foreach($venueimages as $key => $venueimage)
                    <input type="radio" name="slides" id="slide-{{ $key+1 }}" {{ $key === 0 ? 'checked="checked"' : '' }}>
                @endforeach

                <ul class="carousel__slides">
                    @foreach($venueimages as $key => $venueimage)
                        <li class="carousel__slide">
                            <figure>
                                <div>
                                    <img style="box-shadow: 0 6px 21px rgba(0,0,0,1);" src="data:image/jpeg;base64,{{ $venueimage->imagefile }}" alt="">
                                </div>
                                <figcaption>
								
								
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>


				
                <ul class="carousel__thumbnails">
                    @foreach($venueimages as $key => $venueimage)
                        <li>
                            <label for="slide-{{ $key+1 }}"><img src="data:image/jpeg;base64,{{ $venueimage->imagefile }}" alt=""></label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="venue-details" style="margin-left: -80px;">
                <!-- Venuename Field -->
                <div class="col-sm-12">
                    <p style="font-size: 14pt;">Details for {{ $venue->venuename }}</p>
                </div>

                <!-- Addressline1 Field -->
                <div class="col-sm-12">
                    {!! Form::label('addressline1', 'Address:') !!}
                    <p>{{ $venue->addressline1 }} {{ $venue->addressline2 }} {{ $venue->city }} {{ $venue->eircode }}</p>
                </div>
				<!-- Indoor Field 
				<div class="col-sm-12">
					{!! Form::label('indoor', 'Indoor:') !!}
					<p>{{ $venue->indoor }}</p>
				</div> -->

				<!-- Humancapacity Field -->
				<div class="col-sm-12">
					{!! Form::label('humancapacity', 'Capacity:') !!}
					<p>{{ $venue->humancapacity }} people</p>
				</div>

				<!-- Costtorent Field -->
				<div class="col-sm-12">
					{!! Form::label('costtorent', 'Rent Price:') !!}
					<p>€{{ $venue->costtorent }}</p>
				</div>

				<!-- Rating Field -->
				<div class="col-sm-12">
					{!! Form::label('venueratings', 'Venue Ratings:') !!}
					@foreach($venueratings->where('venueid', $venue->id)->slice(-3) as $venuerating)
						<div style="border-style: groove; border-radius: 10px; border-color: lightgrey; margin: 10px 0px 30px 0px;">
							<td>
							  {{ $venuerating->customer->username }}  <input id="fieldRating" data-theme="krajee-fas" name="rating" value="{!! $venuerating->rating !!}" type="hidden" class="rating rating-loading" 
								data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
							{!! $venuerating->comment !!}
							</td>    
						</div>
					@endforeach
				</div>
				
				<!-- Map Field -->
				<div id="mapid" class="center-block" style="width: 350px; height: 200px; margin: 20px 0px 30px 0px; box-shadow: 0 6px 21px rgba(0,0,0,1);"></div>
				
				<!-- Button Field -->
				<div>
					<a class="btn btn-primary1" href="{{ route('venues.displaygrid') }}">Back</a>
					
					<a onclick="handleCheckLogin('{{ url('venueratings/ratevenue', [$venue->id]) }}')"
					   class='btn btn-primary1'>
					   Rate Venue <i class="far fa-stars" title="Rate"></i>
					</a>
					
					<button id="vendisplay" type="button" class="btn btn-primary1 center-block vendisplay" onclick="handleCheckLogin('{{ url('calendar/vendisplay', [$venue->id]) }}')">Book Venue <i class="far fa-calendar-alt"></i></button>
				</div>
            </div>
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


<script>
    var mymap = L.map('mapid');
    var icon = new L.Icon();
    icon.options.shadowSize = [0,0];
    icon.options.iconSize = [40, 40];
    icon.options.iconAnchor = [10, 70];
    icon.options.iconUrl = "{{asset('images/vendor/leaflet/dist/marker-icon.png')}}";
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2hhbGluaWsiLCJhIjoiY2xlYTFwemV2MHBhdjNucXM1cHVlZDN3NiJ9.YyBcnu_XLr3krPvCZFy1RQ', {
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
    }).addTo(mymap);
 mymap.setView(new L.LatLng(53.4053, -6.3784), 13);

$.getJSON({
    url: '{{route('venues.map.json')}}'
}).done(function (venues) {
    var bounds = [];
    for ( var i=0; i < venues.length; ++i ) {
        if (venues[i].id == {{$venue->id}}) {
            thisMarker = L.marker( [venues[i].lat, venues[i].lng] ,{icon : icon}).addTo( mymap ).bindPopup(venues[i].name);
            bounds.push([venues[i].lat,venues[i].lng]);
        }
    }
    //mymap.fitBounds(bounds,{padding: [20,20]});
}).fail(function (xhr, status, error) {
    alert("Failed to load map data.");
});
	
var redIcon = new L.Icon({
	//iconUrl: "{{asset('images\vendor\leaflet\dist\marker-icon-red.png')}}",
	iconSize: [40, 40],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34]
});
redIcon.options.iconUrl = "{{asset('images/vendor/leaflet/dist/redarrow.png')}}";
mymap.locate({setView: true, maxZoom: 16});
function onLocationFound(e) {
	L.marker(e.latlng, {icon: redIcon}).addTo(mymap).bindPopup("This is you!").openPopup();
}
mymap.on('locationfound', onLocationFound);

var group = new L.featureGroup([redIcon, icon]);
mymap.fitBounds(group.getBounds());
 </script>
<script> 
let isAuthenticated = @json(auth()->check());

function handleCheckLogin(url) {
  if (isAuthenticated) {
	window.location.href = url;
  } else {
	let result = confirm('You must login or sign up to view this page. Click OK to login or Cancel to stay on this page.');
	if (result) {
	  window.location.href = '{{ url("login") }}';
	}
  }
}

 </script>