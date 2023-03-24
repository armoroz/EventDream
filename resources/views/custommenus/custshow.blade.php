@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Custo Menu Details for {{ $custommenu->custommenuname }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('custommenus.custshow_fields')
					<div class="col-sm-6" style="margin:10px">
						<a class="btn btn-default float-right" href="{{ route('custommenus.displaygrid') }}">Back</a>
						
					</div>
                </div>
            </div>
        </div>
    </div>
	
@endsection('content')  