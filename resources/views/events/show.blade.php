@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('events.show_fields')
                <div class="col-sm-6" style="margin-left: 850px; margin-bottom: 0px;">
                    <a class="btn btn-primary float-right">
                       href="{{ route('events.index')}}">
                        Back
                    </a>
                </div>					
                </div>
            </div>
        </div>
    </div>
@endsection
