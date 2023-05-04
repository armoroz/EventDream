<section>
    <div class="container">
		<div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap; margin-left: 30px;">
            <div>
			
				<!-- MenuItemimg Field -->
				<div>
					<img  style="box-shadow: 0 6px 21px rgba(0,0,0,1);" class="img-responsive" src="{{ $menuitem->menuitemimglink }}">
				</div>

			</div>
			
			<div style="margin-left: 50px;">
				<!-- Menuitemname Field -->
				<div class="col-sm-12">
					<p style="font-size: 14pt;">Details for {{ $menuitem->menuitemname }}</p>
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

				<!-- Button Field -->
				<div>
					<a class="btn btn-primary" href="{{ route('menuitems.displaygrid') }}">Back<i class='far fa-arrow-alt-up fa-9x fa-rotate-270' style='font-size: 1.2em; margin-left: 5px;'></i></a>
				</div>
            </div>
        </div>
    </div>
</section>