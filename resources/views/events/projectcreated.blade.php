@extends('layouts.app')
@section('content')


<h1 style="text-align: center; margin-top:150px; margin-bottom:30px;"> Your selections have been saved as a Project</h1>
<p style="text-align: center;">
<a href="{{ route('events.projectindex', Auth::user()->customer->id) }}" class="btn btn-primary" style="margin-bottom:350px;">View Projects</a>

</p>




@endsection('content')

