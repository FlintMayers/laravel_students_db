@extends('layouts.app')

@section('content')

@include('user/nav')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($groups as $group)
				<h1 class="text-center">{{ $group->name }} grupes laiskai</h1>
				<div class="well">
					@foreach($group->emails as $email)
						<p>Data: {{ $email->created_at }}</p>
						<h2>Tema: {{ $email->title }}</h2>
						<p> {{ $email->body }}</p>
						<br>
						<hr>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection