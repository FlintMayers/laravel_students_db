@extends('layouts.app')

@section('content')

@if(Auth::user()->is_admin == 2)
	@include('nav')
@else
	@include('user/nav')
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div class="alert alert-success">
			  <strong>Pavyko!</strong> Jusu registracija sekmingai patvirtinta.
			</div>
        </div>
    </div>
</div>
@endsection
