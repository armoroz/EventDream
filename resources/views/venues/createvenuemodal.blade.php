<!-- Modal -->
 <div class="container fluid">
     <div id="createVenueModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" >Create New Venue</h4>
             </div>
             <div class="modal-body container-fluid">
                 {!! Form::open(['id' => 'createVenueForm','route' => 'venues.store']) !!}
                    @include('venues.fields')
                 {!! Form::close() !!}
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <input type="submit" id="submit" class="btn btn-default"/>
             </div>
         </div>
       </div>
     </div>
 </div>
 <!--<script>
     $('#submit').click( function(e) {
         $('#createVenueForm').submit(function(event){
             console.log("submit");
         });
         $('#createVenueModal').modal('hide');
     });
 </script>-->
 
  <script>
 $('#submit').click( function(e) { 
     $("#createVenueForm").submit();
     $('#createVenueModal').modal('hide');
 });
 </script>