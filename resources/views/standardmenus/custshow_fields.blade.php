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
                                <div style="height: 300px;">
                                    <img style="box-shadow: 0 6px 21px rgba(0,0,0,1); height: 450px; width: 400px;" src="{{ $menuitem->menuitemimglink }}" alt="">
                                </div>
                                <figcaption style="margin-left: 30px;">
                                    {{ $menuitem->menuitemname }}
									<span class="credit">€{{ $menuitem->menuitemcost }}</span>
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
            <div class="standardmenu-details" style="margin-left: -30px;">
				
				<!-- Standardmenuname Field -->
				<div class="col-sm-12">
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
							  {{ $standardmenurating->customer->username }}  <input id="fieldRating" data-theme="krajee-fas" name="rating" value="{!! $standardmenurating->rating !!}" type="hidden" class="rating rating-loading" 
								data-min=0 data-max=5 data-step=1 data-size="xs" data-display-only="true">
							{!! $standardmenurating->comment !!}
							</td>    
						</div>
					@endforeach
				</div>
				
				<!-- Button Field -->
				<div>
					<a class="btn btn-primary" href="{{ route('standardmenus.displaygrid') }}">Back<i class='far fa-arrow-alt-up fa-9x fa-rotate-270' style='font-size: 1.2em; margin-left: 5px;'></i></a>
			        <a class="btn btn-primary" href="{!! route('standardmenuratings.ratestandardmenu', [$standardmenu->id]) !!}">Rate Menu<i class='far fa-stars' style='font-size: 1.2em; margin-left: 3px;'></i></a>
				    <button id="addItem" type="button" class="btn btn-primary" value="{{$standardmenu->id}}">Add to Cart<i class='far fa-shopping-cart' style='font-size: 1.em; margin-left: 3px;'></i></button>
				</div>
            </div>
        </div>
    </div>
</section>

<style>

.col-lg-8 {
	min-width: 1000px;
}

.card {
	background-color: transparent;
}

section {
	box-shadow: 0 6px 21px rgba(0,0,0,1);
}

.card {
	border: none;
}


</style>


