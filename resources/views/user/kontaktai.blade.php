@extends('layouts.app')

@section('content')

@include('user/nav')

<div class="container">
	<h1 class="text-center">Kontaktai</h1>
	<div class="row text-center">
		{!! $content !!}
	</div>	
</div>

@endsection