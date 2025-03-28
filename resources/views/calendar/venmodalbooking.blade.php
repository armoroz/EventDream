<div id="fullCalModal" class="modal" role="dialog" style="margin-top: 100px;">
  <div class="modal-dialog"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">×</button> <h4 class="modal-title" style="margin-right: 170px;">Book an Event</h4>    
    </div> 
      <div class="modal-body"> 
        <div class="container-fluid"> 
          <form action="{{route('events.venstore')}}" method="post">
            @csrf
              <div class="form-group">
				<input type="hidden" class="form-control" value="{{Auth::user()->customer->id}}" id="custid" name="customerid"/> 
			  </div>
              <div class="form-group">
				<input type="hidden" class="form-control" value="Event" id="eventstatus" name="eventstatus"/> 
			  </div>
			  <div class="form-group"> 
				<label for="venueid">Venue</label> 
				<input type="hidden" class="form-control" value="{{$venueid}}" id="venueid" name="venueid" readonly/> 
				<input type="text" class="form-control" value="{{$venue->venuename}}" readonly/>
			  </div>
			  <div class="form-group"> 
				<label for="eventdate">Event Date</label> 
				<input type="text" class="form-control" id="eventDate" name="eventdate" readonly/> 
			  </div> 
			  <div class="form-group"> 
				<label for="eventtime">Event Time</label> 
				<input type="text" class="form-control" id="eventtime" name="eventtime" placeholder="HH:MM" />
			  </div> 
			  <div class="form-group"> 
				<label for="eventname">Event Name</label> 
				<input type="text" class="form-control" id="eventname" name="eventname" placeholder="e.g. Mia's 21st"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="numOfGuests">No. of Guests</label> 
				<input type="text" class="form-control" id="numOfGuests" name="numOfGuests" placeholder="No. of Guests" />
			  </div> 
			  <div class="modal-footer"> 
				<button type="submit" id="submitButton" class="btn btn-default" data-dismiss="modal">Book Event</button> 
			  </div> 
		  </form> 
		</div> 
	  </div> 
	</div> 
  </div> 
</div>