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
    {!! Form::label('indoor', 'Indoor?:') !!}
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

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userid', 'Userid:') !!}
    <p>{{ $venue->userid }}</p>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

