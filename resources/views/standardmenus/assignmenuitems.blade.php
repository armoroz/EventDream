@extends('layouts.app')

@section('content')
<style>
.control-label {
    text-align: right;
}
</style>
    <section class="content-header">
        <h1>
            Menuitems for Standardmenu: <b>{{$standardmenu->name}}</b> 
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
            {!! Form::model($standardmenu, ['route' => ['menuitems.menuitemsupdate', $standardmenu->id], 'method' => 'patch']) !!}
                <div class="row" style="padding-left: 20px">
                    
                    <div class="form-group col-sm-4">
                            @foreach($menuitems as $menuitem)
                            <label class="control-label col-sm-10">{{$menuitem->name}}</label>
                            <div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[{{$menuitem->id}}]"
                                    @if($standardmenu->hasMenuitem($menuitem)) checked @endif ></div>
                                    
                                    
                            @endforeach
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('menuitems.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
             {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection