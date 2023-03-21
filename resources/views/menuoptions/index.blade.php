@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Options</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-primary mx-2" href="{{ route('standardmenus.displaygrid') }}">
                Standard Menus
            </a>
            <a class="btn btn-primary mx-2" href="{{ route('custommenus.displaygrid') }}">
                Custom Menus
            </a>
            <a class="btn btn-primary mx-2" href="{{ route('menuitems.displaygrid') }}">
                Menu Items
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="card-footer clearfix">
                    <div class="float-right"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 10px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #3e8e41;
        }
    </style>
@endsection
