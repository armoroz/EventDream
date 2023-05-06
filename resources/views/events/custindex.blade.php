@extends('layouts.app')

@section('content')
    <section class="content-header">

                    <h1 style="text-align: center; font-family: Garamond, serif;">My Events</h1>

    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('events.custtable')
            </div>

        </div>
    </div>

@endsection

