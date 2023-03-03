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
				<input type="text" class="form-control" id="bookedDate" name="bookeddate"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="bookedtime">Booked Time</label> 
				<input type="text" class="form-control" id="bookedtime" name="bookedtime"/> 
			  </div> 
			  <div class="form-group"> 
				<label for="venueid">VenueID</label> 
				<input type="text" class="form-control" id="venueid" name="venueid"/> 
			  </div>
              <div class="form-group"> 
				<label for="productid">ProductID</label> 
				<input type="text" class="form-control" id="productid" name="productid"/> 
			  </div>
			  <div class="form-group"> 
				<label for="bookedprodquantity">bookedprodquantity</label> 
				<input type="text" class="form-control" id="bookedprodquantity" name="bookedprodquantity"/> 
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