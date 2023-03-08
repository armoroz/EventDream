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
@foreach($venueratings as $venuerating)
	<div><a href="{{ route('venueratings.showvenueratings', [$venue->id] )}}">
		<td>
			<input id="fieldRating" name="rating" value="{!! $venuerating->rating !!}" type="text" class="rating rating-loading" 
			data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
		</td>
    </div>
@endforeach
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
     icon.options.iconSize = [20, 40];
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
           thisMarker = L.marker( [venues[i].lat, venues[i].lng] ,{icon : icon}).addTo( mymap ).bindPopup(venues[i].name);
           bounds.push([venues[i].lat,venues[i].lng]);
        }
        mymap.fitBounds(bounds,{padding: [20,20]});
    }).fail(function (xhr, status, error) {
        alert("There is a problem with your route to your json data: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
});

	mymap.on('click', onMapClick);

	function onMapClick(e) { 
		$('#lat').val(e.latlng.lat);
		$('#lng').val(e.latlng.lng);        
		$('#createVenueModal').modal('show');
	}

 </script>
 @include('venues.createvenuemodal')

