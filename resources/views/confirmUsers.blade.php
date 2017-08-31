@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">
  <h1 class="text-center">Nepatvirtinti vartotojai</h1>
  <div class="row">
	  <div class="col-md-6 col-md-offset-3">
		@foreach($users as $user)
		<div class="well">
		 	<form method="post" action="{{ route('insertRole') }}">
		 		{{ csrf_field() }}
		 		<input type="hidden" value="{{ $user->id }}" name="id">
		 		<h5>Vardas: {{ $user->name }}</h5>	
		 		<h5>Pavarde: {{ $user->surname }}</h5>
		 		<h5>El. Pastas: {{ $user->email }}</h5>
		 		<h5>Telefonas: {{ $user->phone }}</h5>
		 		<h5>Adresas: {{ $user->address }} {{ $user->city }}</h5>
	 			<select name="role">
		 	  		<option value="1">Studentas</option>
		 	  		<option value="2">Destytojas</option>
		 	  	</select>
		 	  	<input type="submit" value="priskirti role" class="btn btn-success">
		 	</form>		
	 	</div>
		@endforeach
		
	  </div>
		@if($usersCount == 0)
        <div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info">
			  <strong>Informacija!</strong> Siuo metu naujai registruotu vartotoju nera.
			</div>
        </div>		
		@endif
  </div>
  <br>
	@if (count($errors) > 0)
	<!--   	klaidos -->
    <div class="row">
	  	<div class="alert alert-danger">
			<ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		</div>
	</div>
</div>
	@endif

@endsection