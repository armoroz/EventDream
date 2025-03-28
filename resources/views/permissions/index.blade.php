@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

@section('side2')
<div class="button-container" style="margin-bottom: 300px;">
    <a href="{{ route('permissions.create') }}" class="btn btn-primary1 fixed-button">New Permission <i class="far fa-plus-circle" style="font-size: 1.1em; margin-right: 5px;"></i></a>
</div>
@endsection('side2')

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('permissions.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

