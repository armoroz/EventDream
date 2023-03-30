@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Custom Menu Details for {{ $custommenu->custommenuname }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('custommenus.custshow_fields')
					<div class="col-sm-6" style="margin-right:10px">
						<a href="{{ route('custommenus.displaygrid') }}"><button class="btn btn-back"><i class='far fa-arrow-alt-up fa-9x fa-rotate-270'></i></button></a>
					</div>
                </div>
            </div>
        </div>
    </div>
	
@endsection('content')  