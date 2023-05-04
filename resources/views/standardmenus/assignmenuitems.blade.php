@extends('layouts.app')
@section('content')
<style>
.control-label {
    text-align: right;
}
</style>
<section class="content-header">
    <h1>
        Menu Items for Standard Menu: <b>{{$standardmenu->standardmenuname}}</b> 
    </h1>
</section>
<div class="content">
    {!! Form::open(['route' => ['standardmenus.updatemenuitems', $standardmenu->id], 'method' => 'patch']) !!}
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-condensed table-bordered"> 
                <thead> 
                    <tr> 
                        <th colspan="4" style="text-align: center;">Starters</th>
                    </tr>
                    <tr> 
                        <th>Image</th>
                        <th>Name</th>
                        <th>Check</th>
                        <th>Price</th> 
                    </tr>
                </thead> 
                <tbody> 
                    @foreach($menuitems->where('course', 'starter') as $menuitem)
                    <tr>
                        <td><img height="100px" width="100px" src="{{ $menuitem->menuitemimglink }}"></td>
                        <td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
                        <td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
                            @if($standardmenu->menuitems->contains($menuitem)) checked @endif ></div></td>
                        <td>€{{$menuitem->menuitemcost}} </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-sm-4">
            <table class="table table-condensed table-bordered"> 
                <thead> 
                    <tr> 
                        <th colspan="4" style="text-align: center;">Main Course</th>
                    </tr>
                    <tr> 
                        <th>Image</th>
                        <th>Name</th>
                        <th>Check</th>
                        <th>Price</th> 
                    </tr>
                </thead> 
                <tbody> 
                    @foreach($menuitems->where('course', 'main') as $menuitem)
                    <tr>
                        <td><img height="100px" width="100px" src="{{ $menuitem->menuitemimglink }}"></td>
                        <td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
                        <td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
                            @if($standardmenu->menuitems->contains($menuitem)) checked @endif ></div></td>
                        <td>€{{$menuitem->menuitemcost}} </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-sm-4">
            <table class="table table-condensed table-bordered"> 
                <thead> 
                    <tr> 
                        <th colspan="4" style="text-align: center;">Desserts</th>
                    </tr>
					<tr> 
                        <th>Image</th>
                        <th>Name</th>
                        <th>Check</th>
                        <th>Price</th> 
                    </tr>
                </thead> 
                <tbody> 
                    @foreach($menuitems->where('course', 'desert') as $menuitem)
                    <tr>
                        <td><img style="max-height:100px; width:100px;" src="{{ $menuitem->menuitemimglink }}"></td>
                        <td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
                        <td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
                            @if($standardmenu->menuitems->contains($menuitem)) checked @endif ></div></td>
                        <td>€{{$menuitem->menuitemcost}} </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
			<!-- Submit Fieldd -->
			<div class="form-group col-sm-12">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
				<a href="{!! route('standardmenus.index') !!}" class="btn btn-default">Cancel</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection('content')           