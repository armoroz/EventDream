<!-- Standardmenuname Field -->
<div class="col-sm-12">
    {!! Form::label('standardmenuname', 'Standardmenuname:') !!}
    <p>{{ $standardmenu->standardmenuname }}</p>
</div>

<!-- Style Field -->
<div class="col-sm-12">
    {!! Form::label('style', 'Style:') !!}
    <p>{{ $standardmenu->style }}</p>
</div>

<!-- Course Field -->
<div class="col-sm-12">
    {!! Form::label('course', 'Course:') !!}
    <p>{{ $standardmenu->course }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $standardmenu->description }}</p>
</div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userid', 'Userid:') !!}
    <p>{{ $standardmenu->userid }}</p>
</div>

<!-- Rating Field -->
<div class="col-sm-12">
@foreach($standardmenuratings as $standardmenurating)
	<div><a href="{{ route('standardmenuratings.showstandardmenuratings', [$standardmenu->id] )}}">
		<td>
			<input id="fieldRating" name="rating" value="{!! $standardmenurating->rating !!}" type="text" class="rating rating-loading" 
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
    </ol>
      <div id="thisCarousel" class="carousel slide" data-ride="carousel">
        <!-- Images -->
        <div class="carousel-inner" role="listbox">	
            @foreach($standardmenuimages as $standardmenuimage)
            
              <div style="padding-bottom:20px" class="item @if($loop->first) active @endif">
                <img src="data:image/jpeg;base64,{{ $standardmenuimage->imagefile }}" 
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

