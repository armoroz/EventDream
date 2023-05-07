@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

@section('side2')
<div class="button-container">
    <a href="{{ route('roles.create') }}" class="btn btn-primary1 fixed-button">New Role<i class="fas fa-plus-circle" style="font-size: 1.2em; margin-right: 5px;"></i></a>
</div>
@endsection('side2')


    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('roles.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

