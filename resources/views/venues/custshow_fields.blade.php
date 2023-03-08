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

<!-- Imagefile Field -->
<div class="container-fluid">
    <div id="thisCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#thisCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#thisCarousel" data-slide-to="1"></li>
      <li data-target="#thisCarousel" data-slide-to="2"></li>
	  <li data-target="#thisCarousel" data-slide-to="3"></li>
    </ol>
      <div id="thisCarousel" class="carousel slide" data-ride="carousel">
        <!-- Images -->
        <div class="carousel-inner" role="listbox">	
            @foreach($venueimages as $venueimage)
            
              <div style="padding-bottom:20px" class="item @if($loop->first) active @endif">
                <img src="data:image/jpeg;base64,{{ $venueimage->imagefile }}" 
                    style="width:45%;height:350px;" class="img-responsive center-block">
              </div>  
            @endforeach
        </div>
        <!--controls -->
        <a class="left carousel-control" href="#thisCarousel" data-slide="prev" style="background-image:none;color: black;">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#thisCarousel" data-slide="next" style="background-image:none;color: black;">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
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
        attribution: 'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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
        if (venues[i].id == {{$venue->id}}) { // check if the current venue ID matches the ID of the venue you want to display on the map
            thisMarker = L.marker( [venues[i].lat, venues[i].lng] ,{icon : icon}).addTo( mymap ).bindPopup(venues[i].name);
            bounds.push([venues[i].lat,venues[i].lng]);
        }
    }
    //mymap.fitBounds(bounds,{padding: [20,20]});
}).fail(function (xhr, status, error) {
    alert("Failed to load map data.");
});
	
// Add a red coloured marker for the user's current location
var redIcon = new L.Icon({
	//iconUrl: "{{asset('images\vendor\leaflet\dist\marker-icon-red.png')}}",
	iconSize: [55, 50],
	iconAnchor: [12, 41],
	popupAnchor: [1, -34]
});
redIcon.options.iconUrl = "{{asset('images/vendor/leaflet/dist/red-icon-arrow.png')}}";
mymap.locate({setView: true, maxZoom: 16});
function onLocationFound(e) {
	L.marker(e.latlng, {icon: redIcon}).addTo(mymap).bindPopup("You are here!").openPopup();
}
mymap.on('locationfound', onLocationFound);

// set the view of the map to show both markers
var group = new L.featureGroup([redIcon, icon]);
mymap.fitBounds(group.getBounds());

 </script>
 @include('venues.createvenuemodal')

