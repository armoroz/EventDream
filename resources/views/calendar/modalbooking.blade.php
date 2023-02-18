<div id="fullCalModal" class="modal" role="dialog">
  <div class="modal-dialog"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">×</button> <h4 class="modal-title">Modal Header</h4>       </div> 
      <div class="modal-body"> 
        <div class="container-fluid"> 
          <form action="{{route('bookings.store')}}" method="post">
            @csrf
              <div class="form-group"> <label for="customerid">Customer ID</label> 
				<input type="text" class="form-control" id="custid" name="customerid"/> 
			  </div>
			  <div class="form-group"> 
				<label for="bookeddate">Booked Date</label> 
				<input type="text" class="form-control" id="bookingDate" name="bookingdate"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="bookedtime">Booked Time</label> 
				<input type="text" class="form-control" id="starttime" name="starttime"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="venueid">VenueID</label> 
				<input type="text" class="form-control" id="venueid" name="venueid"/> 
			  </div> 
			  <div class="modal-footer"> 
				<button type="submit" id="submitButton" class="btn btn-default" data-dismiss="modal">Create Appointment</button> 
			  </div> 
		  </form> 
		</div> 
	  </div> 
	</div> 
  </div> 
</div>