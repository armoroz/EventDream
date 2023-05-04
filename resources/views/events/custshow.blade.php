@extends('layouts.app')

@section('content')

        <h1 style="text-align: center; font-family: Garamond, serif;">Your Event Details</h1>


    <div class="content px-3">
        <div class="card">
            <div class="card-body p-0">
                    @include('events.custshow_fields')				
            </div>
        </div>
    </div>
@endsection
