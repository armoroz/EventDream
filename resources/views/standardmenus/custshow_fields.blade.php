<section>
    <div class="container">
        <div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap;">
            <div class="carousel">
                @foreach($standardmenu->menuitems as $key => $menuitem)
                    <input type="radio" name="slides" id="slide-{{ $key+1 }}" {{ $key === 0 ? 'checked="checked"' : '' }}>
                @endforeach

                <ul class="carousel__slides">
                    @foreach($standardmenu->menuitems as $key => $menuitem)
                        <li class="carousel__slide">
                            <figure>
                                <div>
                                    <img style="box-shadow: 0 6px 21px rgba(0,0,0,1);" src="{{ $menuitem->menuitemimglink }}" alt="">
                                </div>
                                <figcaption>
                                    {{ $menuitem->menuitemname }}
									€{{ $menuitem->menuitemcost }}
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <ul class="carousel__thumbnails">
                    @foreach($standardmenu->menuitems as $key => $menuitem)
                        <li>
                            <label for="slide-{{ $key+1 }}"><img src="{{ $menuitem->menuitemimglink }}" alt=""></label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="standardmenu-details" style="margin-left: -80px;">
				
				<!-- Standardmenuname Field -->
				<div class="col-sm-12">
					{!! Form::label('standardmenuname', 'Standard Menu Name:') !!}
					<p style="font-size: 14pt;">Details for {{ $standardmenu->standardmenuname }}</p>
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

				<!-- Rating Field -->
				<div class="col-sm-12">
					{!! Form::label('standardmenuratings', 'Standard Menu Ratings:') !!}
					@foreach($standardmenuratings->where('standardmenuid', $standardmenu->id)->slice(-3) as $standardmenurating)
						<div style="border-style: groove; border-radius: 10px; border-color: lightgrey; margin: 10px 0px 30px 0px;">
							<td>
							  {{ $standardmenurating->customer->username }}  <input id="fieldRating" data-theme="krajee-fas" name="rating" value="{!! $standardmenurating->rating !!}" type="text" class="rating rating-loading" 
								data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
							{!! $standardmenurating->comment !!}
							</td>    
						</div>
					@endforeach
				</div>
            </div>
        </div>
    </div>
</section>

<!-- Standardmenuname Field -->
<div class="col-sm-12">
    {!! Form::label('standardmenuname', 'Standard Menu Name:') !!}
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

<!-- Rating Field -->
<div class="col-sm-12">
    {!! Form::label('standardmenuratings', 'Standard Menu Ratings:') !!}
    @foreach($standardmenuratings->where('standardmenuid', $standardmenu->id)->slice(-3) as $standardmenurating)
        <div style="border-style: groove; border-color: lightgrey;">
            <td>
              {{ $standardmenurating->customer->username }}  <input id="fieldRating" data-theme="krajee-fas" name="rating" value="{!! $standardmenurating->rating !!}" type="text" class="rating rating-loading" 
                data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
            {!! $standardmenurating->comment !!}
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
</div>

