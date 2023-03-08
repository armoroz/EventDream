@extends('layouts.app')
 @csrf
 @section('content')
 <div id="mapid" class="center-block" style="width: 100%; height: 600px;"></div>
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
	
	// Add a red coloured marker for the user's current location
	var redIcon = new L.Icon({
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

    
 </script>
 @include('venues.createvenuemodal')
 @endsection