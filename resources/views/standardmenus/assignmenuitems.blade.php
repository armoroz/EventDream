@extends('layouts.app')
@section('content')
<style>
.control-label {
    text-align: right;
}
</style>
<section class="content-header">
    <h1>
        Menuitems for Standardmenu: <b>{{$standardmenu->standardmenuname}}</b> 
    </h1>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => ['standardmenus.updatemenuitems', $standardmenu->id], 'method' => 'patch']) !!}
            <div class="row" style="padding-left: 20px">
                <div class="form-group col-sm-4">
                    @foreach($menuitems as $menuitem)
                    <label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label>
                    <div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]"
                            value="{{$menuitem->id}}" @if($standardmenu->menuitems->contains($menuitem)) checked @endif ></div>
                    @endforeach
                </div>
                <!-- Submit Fieldd -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('standardmenus.index') !!}" class="btn btn-default">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection