@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-center">
            <div class="col-sm-6 text-center" style="padding-bottom: 100px; padding-top: 20px;">
                <h1>Menu Items</h1>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<style>

	
	.checkbox {
        margin-left: 10px;
    }
	
	.btn-checkbox {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<form action="{{route('menuitems.newstandardmenu')}}" id="newmenuform" method="post">
	@csrf
	<div class='d-flex flex-wrap align-content-start bg-transparent' style="margin:-100px"> 
	@foreach($menuitems as $menuitem) 
	  <div class="p-0 col-4 g-4">
		<div class= "bodyoptions-meni">
		  <div class= "container-meni">
			<div class="card-meni" style="height: 100%;">
				<div class="box-image-meni">
					<div class="image-wrapper">
						<img src="{{ $menuitem->menuitemimglink }}">
					</div>
				</div>
				<div class="content-meni">
				<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $menuitem->menuitemname }}</h5></div>
				<div class="card-footer">
					<div class="btn-checkbox">
						<div class="text-center">
							<a  href="{{ route('menuitems.custshow', [$menuitem->id]) }}"><button id="custshow" type="button" class="btn btn-primary1 custshow">Details <i class="fas fa-info-circle"></i></button></a>
						</div>
						<div class="checkbox">
							<input type="checkbox" id="cbox-selectMenuItems-{{ $menuitem->id }}" name="menuitems[]" value="{{ $menuitem->id }}">
							<label for="cbox-selectMenuItems-{{ $menuitem->id }}"></label>
						</div>
					</div>
				</div>
				</div> 
			</div>
		  </div> 
		</div>
	 </div> 
	 @endforeach
	</div>
	
	<div>
	<button type="button" onclick="handleCheckLogin1('{{route('menuitems.newstandardmenu')}}')" id="newmenubtn" class="btn btn-primary1" style=" margin-left: 150px; margin-top: 200px;">Save to Custom Menu<i class="far fa-utensil-fork" style='font-size: 1.2em; margin-left: 5px;'></i></button>

	</div>
</form>

<script>
$(document).ready(function () {
    console.log("ready");
});

function handleCheckLogin1() {
    if (isAuthenticated) {
        $('#newmenubtn').click(function () {
            console.log('hello');
            $('#newmenuform').submit();
        });
        window.location.href = url;
    } else {
        let result = confirm('You must login or sign up to view this page. Click OK to login or Cancel to stay on this page.');
        if (result) {
            window.location.href = '{{ url("login") }}';
        }
    }
}

let isAuthenticated = @json(auth()->check());
</script>

@endsection('content')