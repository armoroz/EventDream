@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 


    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('menuitems.custshow_fields')
                </div>
            </div>
        </div>
    </div>
	
@endsection('content')