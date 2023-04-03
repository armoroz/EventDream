@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Give Our Standard Menu A Rating!</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'standardmenuratings.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('standardmenuratings.ratestandardmenu_fields')
                </div>

            </div>

            <div class="card-footer">
                <form method="POST" action="{{ route('standardmenuratings.store') }}">
					@csrf
					<input type="hidden" name="standardmenuid" value="{{ $standardmenuid }}">
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
                <a href="{{ route('standardmenuratings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
