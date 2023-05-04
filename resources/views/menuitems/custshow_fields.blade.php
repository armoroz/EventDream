<section>
    <div class="container">
        <div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap;">
            <div class="carousel">
                @foreach($menuitems as $key => $menuitem)
                    <input type="radio" name="slides" id="slide-{{ $key+1 }}" {{ $key === 0 ? 'checked="checked"' : '' }}>
                @endforeach

                <ul class="carousel__slides">
                    @foreach($menuitems as $key => $menuitem)
                        <li class="carousel__slide">
                            <figure>
                                <div style="height: 300px;">
                                    <img style="box-shadow: 0 6px 21px rgba(0,0,0,1); height: 450px; width: 400px;" src="{{ $menuitem->menuitemimglink }}" alt="">
                                </div>
                                <figcaption>
                                    
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
				
                <ul class="carousel__thumbnails">
                    @foreach($menuitems as $key => $menuitem)
                        <li>
                            <label for="slide-{{ $key+1 }}"><img src="{{ $menuitem->menuitemimglink }}" alt=""></label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="menuitem-details" style="margin-left: -30px;">
			
				<!-- Menuitemname Field -->
				<div class="col-sm-12">
					{!! Form::label('menuitemname', 'Menu Item Name:') !!}
					<p>{{ $menuitem->menuitemname }}</p>
				</div>

				<!-- Description Field -->
				<div class="col-sm-12">
					{!! Form::label('menuitemdesc', 'Description:') !!}
					<p>{{ $menuitem->menuitemdesc }}</p>
				</div>

				<!-- Nutrition Field -->
				<div class="col-sm-12">
					{!! Form::label('menuitemnutrition', 'Nutrition:') !!}
					<p>{{ $menuitem->menuitemnutrition }}</p>
				</div>

				<!-- Allergens Field -->
				<div class="col-sm-12">
					{!! Form::label('menuitemallergens', 'Allergens:') !!}
					<p>{{ $menuitem->menuitemallergens }}</p>
				</div>

				<!-- Course Field -->
				<div class="col-sm-12">
					{!! Form::label('course', 'Course:') !!}
					<p>{{ $menuitem->course }}</p>
				</div>

				
            </div>
        </div>
    </div>
</section>
				<!-- MenuItemimg Field -->
				<div><td><img class="img-responsive left-block" 
					height="200px" width="200px" src="{{ $menuitem->menuitemimglink }}">
				</td></div>