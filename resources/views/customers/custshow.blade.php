@extends('layouts.app')
@section('content')
@include('flash::message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('customers.custshow_fields')
					<div class="col-sm-6" style="margin-left: 750px; margin-bottom: 20px;">
						<a class="btn btn-primary float-right"
						   href="{{ route('homepage') }}">
							Back
						</a>
						<a class="btn btn-primary float-right"
						   href="{!! route('customers.custedit', [Auth::user()->customer->id]) !!}">
							Edit Profile
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
@endsection
