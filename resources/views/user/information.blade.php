@extends('layouts.app')

@section('content')

@include('user/nav')

<div class="container">
	<div class="row">
		<h2>Prisijunges {{ $user->name }} {{$user->surname}}</h1>
		<h2>El. Pastas {{ $user->email }}</h2>
		<h2>Tel. {{ $user->phone }}</h2>
	</div>
	
	@foreach($groups as $group)
    <div class="row">
	  <div class="col-md-12 ">
		<h1 class="text-center"> {{$group->name}} grupes paskaitu medziaga</h1>
	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>Data</th>
	 	  	<th>Pavadinimas</th>
	 	  	<th>Aprasas</th>
	 	  	<th>Failai</th>
	 	  </tr>
	 	@foreach($group->lectures as $lecture)
	 	  <tr>
	 	  	<td>{{ $lecture->lecture_date }}</td>
	 	  	<td>{{ $lecture->name }}</td>
	 	  	<td>{{ $lecture->description }}</td>
	 	  	<td>
	 	  	@foreach($lecture->files as $failas)
	 	  		@if($failas->visibility == 1)
	 	  			<a href="{{asset('/storage/' . $failas->name)}}">Failas</a><br>
	 	  		@endif
	 	  	@endforeach
	 	  	</td>
	 	   </tr>
	 	 @endforeach
		</table>
	  </div>
  </div>
  @endforeach
	
</div>

@endsection