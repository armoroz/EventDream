@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Venue Rating</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'venueratings.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('venueratings.ratevenue_fields')
                </div>

            </div>

            <div class="card-footer">
                <form method="POST" action="{{ route('venueratings.store') }}">
					@csrf
					<input type="hidden" name="venueid" value="{{ $venueid }}">
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
                <a href="{{ route('venueratings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
