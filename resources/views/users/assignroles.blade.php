@extends('layouts.app')

@section('content')
<style>
.control-label {
    text-align: right;
}
</style>
    <section class="content-header">
        <h1>
            Roles for User: <b>{{$user->name}}</b> 
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
            {!! Form::model($user, ['route' => ['roles.rolesupdate', $user->id], 'method' => 'patch']) !!}
                <div class="row" style="padding-left: 20px">
                    
                    <div class="form-group col-sm-4">
                            @foreach($roles as $role)
                            <label class="control-label col-sm-10">{{$role->name}}</label>
                            <div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="role[{{$role->id}}]"
                                    @if($user->hasRole($role)) checked @endif ></div>
                                    
                                    
                            @endforeach
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
             {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection