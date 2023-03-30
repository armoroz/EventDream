@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Custommenu</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($custommenu, ['route' => ['custommenus.update', $custommenu->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('custommenus.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Create Custom Menu', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('custommenus.displaygrid') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
