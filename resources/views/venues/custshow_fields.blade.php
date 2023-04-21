<!-- Venuename Field -->
<div class="col-sm-12">
    {!! Form::label('venuename', 'Venuename:') !!}
    <p>{{ $venue->venuename }}</p>
</div>

<!-- Addressline1 Field -->
<div class="col-sm-12">
    {!! Form::label('addressline1', 'Addressline1:') !!}
    <p>{{ $venue->addressline1 }}</p>
</div>

<!-- Addressline2 Field -->
<div class="col-sm-12">
    {!! Form::label('addressline2', 'Addressline2:') !!}
    <p>{{ $venue->addressline2 }}</p>
</div>

<!-- City Field -->
<div class="col-sm-12">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $venue->city }}</p>
</div>

<!-- Eircode Field -->
<div class="col-sm-12">
    {!! Form::label('eircode', 'Eircode:') !!}
    <p>{{ $venue->eircode }}</p>
</div>

<!-- Indoor Field -->
<div class="col-sm-12">
    {!! Form::label('indoor', 'Indoor:') !!}
    <p>{{ $venue->indoor }}</p>
</div>

<!-- Humancapacity Field -->
<div class="col-sm-12">
    {!! Form::label('humancapacity', 'Humancapacity:') !!}
    <p>{{ $venue->humancapacity }}</p>
</div>

<!-- Costtorent Field -->
<div class="col-sm-12">
    {!! Form::label('costtorent', 'Costtorent:') !!}
    <p>{{ $venue->costtorent }}</p>
</div>

<!-- Rating Field -->
<div class="col-sm-12">
    {!! Form::label('venueratings', 'Venue Ratings:') !!}
    @foreach($venueratings->slice(-3) as $venuerating)
        <div style="border-style: groove; border-color: lightgrey;">
            <td>
              {{ $venuerating->customer->username }}  <input id="fieldRating" data-theme="krajee-fas" name="rating" value="{!! $venuerating->rating !!}" type="text" class="rating rating-loading" 
                data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
            {!! $venuerating->comment !!}
			</td>    
        </div>
    @endforeach
</div>

<!-- Imagefile Field -->
<div class="container-fluid" style="max-width: 400px; min-width: 400px; min-height: 300px; max-height: 300px;">
    <div id="thisCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" style="background-color: lightgrey;">
            @foreach($venueimages as $index => $venueimage)
                <li data-bs-target="#thisCarousel" data-bs-slide-to="{{ $index }}" class="@if($loop->first) active @endif"></li>
            @endforeach
        </ol>

        <!-- Images -->
        <div class="carousel-inner" style="height: 200px;">
            @foreach($venueimages as $venueimage)
                <div class="carousel-item @if($loop->first) active @endif" style="height: 200px;">
                    <img src="data:image/jpeg;base64,{{ $venueimage->imagefile }}" class="d-block w-100" style="object-fit: cover; height: 100%;" alt="Venue Image">
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" style="background-color: lightgrey;" type="button" data-bs-target="#thisCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" style="background-color: lightgrey;" type="button" data-bs-target="#thisCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


@csrf

<div id="mapid" class="center-block" style="width: 40%; height: 200px;"></div>
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
	iconSize: [55, 50],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34]
});
redIcon.options.iconUrl = "{{asset('images/vendor/leaflet/dist/red-icon-arrow.png')}}";
mymap.locate({setView: true, maxZoom: 16});
function onLocationFound(e) {
	L.marker(e.latlng, {icon: redIcon}).addTo(mymap).bindPopup("This is you!").openPopup();
}
mymap.on('locationfound', onLocationFound);

var group = new L.featureGroup([redIcon, icon]);
mymap.fitBounds(group.getBounds());

 </script>
 @include('venues.createvenuemodal')

