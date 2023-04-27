@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

 <style>
.card {
  margin: 0 auto;
  float: none;
}

.col-sm-6 .btn {
    margin-right: 5px;
}
.button-group {
  display: flex;
  align-items: center;
}
.button-group .btn {
  margin-right: 5px;
}
 </style>
 
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card" style="max-width: 600px">
            <div class="card-body">
                <div class="row">
                    @include('projects.custshow_fields')
					<div class="col-sm-6 button-group">
						<a href="{{ route('projects.custindex', [$project->id]) }}"><button class="btn btn-back d-inline-block"><i class='far fa-arrow-alt-up fa-9x fa-rotate-270'></i></button></a>
						<a href="{{ route('products.displaygrid') }}" class='btn btn-primary'>Add-ons</a>
						{!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete', 'class' => 'd-inline-block']) !!}
						<div class='btn-group'>{!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}</div>
						{!! Form::close() !!} 
					</div>	
                </div>
            </div>
        </div>
    </div>
@endsection
