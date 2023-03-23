<div id="fullCalModal" class="modal" role="dialog">
  <div class="modal-dialog"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">×</button> <h4 class="modal-title">Book an Event</h4>       </div> 
      <div class="modal-body"> 
        <div class="container-fluid"> 
          <form action="{{route('events.store')}}" method="post">
            @csrf
              <div class="form-group"> <label for="customerid">Customer</label> 
				<input type="text" class="form-control" id="custid" name="customerid"/> 
			  </div>
			  <div class="form-group"> 
				<label for="eventdate">Event Date</label> 
				<input type="text" class="form-control" id="eventdate" name="eventdate"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="eventtime">Event Time</label> 
				<input type="text" class="form-control" id="eventtime" name="eventtime"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="venueid">Venue</label> 
				<input type="text" class="form-control" id="venueid" name="venueid"/> 
			  </div>
              <div class="form-group"> 
				<label for="productid">Product</label> 
				<input type="text" class="form-control" id="productid" name="productid"/> 
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